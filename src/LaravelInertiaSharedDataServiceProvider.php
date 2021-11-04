<?php

declare(strict_types=1);

namespace Ebess\LaravelInertiaSharedDataProvider;

use Ebess\LaravelInertiaSharedDataProvider\Contracts\InertiaSharedDataProvider;
use Ebess\LaravelInertiaSharedDataProvider\Http\Middleware\InertiaSharedData;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelInertiaSharedDataServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-inertia-shared-data-provider');
    }

    public function boot()
    {
        $this->app->when(InertiaSharedData::class)
            ->needs(InertiaSharedDataProvider::class)
            ->giveTagged(InertiaSharedDataProvider::TAG_NAME);
    }

    public function register()
    {
    }
}
