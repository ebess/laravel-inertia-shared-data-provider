<?php

declare(strict_types=1);

namespace Ebess\LaravelInertiaSharedDataProvider\Http\Middleware;

use Closure;
use Ebess\LaravelInertiaSharedDataProvider\Contracts\InertiaSharedDataProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Middleware;

class InertiaSharedData extends Middleware
{
    /** @var Collection|InertiaSharedDataProvider[] */
    private Collection $providers;

    public function __construct(InertiaSharedDataProvider ...$providers)
    {
        $this->providers = collect($providers);
    }

    public function handle(Request $request, Closure $next)
    {
        $this->providers->each(fn(InertiaSharedDataProvider $provider) => Inertia::share($provider->provide($request)));

        return $next($request);
    }
}
