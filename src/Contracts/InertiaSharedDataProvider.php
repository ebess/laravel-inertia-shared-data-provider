<?php

declare(strict_types=1);

namespace Ebess\LaravelInertiaSharedDataProvider\Contracts;

use Illuminate\Http\Request;

interface InertiaSharedDataProvider
{
    public const TAG_NAME = 'inertia-shared-data-provider';

    public function provide(Request $request): array;
}
