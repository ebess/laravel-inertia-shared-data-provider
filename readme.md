# ebess/laravel-inertia-shared-data-provider

This package enables you to share inertia data easy.

## Installation

Install via composer

```bash
composer require ebess/laravel-inertia-shared-data-provider
```

Add middleware before the inertia request middleware

```php
    protected $middlewareGroups = [
        'web' => [
            // ...
            \Ebess\LaravelInertiaSharedDataProvider\Http\Middleware\InertiaSharedData::class,
            \App\Http\Middleware\HandleInertiaRequests::class,
        ],
    ];
```

## Usage
Implement shared data provider

```php
use Ebess\LaravelInertiaSharedDataProvider\Contracts\InertiaSharedDataProvider;

class FooBarSharedDataProvider implements InertiaSharedDataProvider
{
    public function provide(Request $request): array
    {
        return [
            'foo' => 'bar',
        ];
    }
}
```

Tag the provider

```php
use Ebess\LaravelInertiaSharedDataProvider\Contracts\InertiaSharedDataProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->tag(
            FooBarSharedDataProvider::class,
            InertiaSharedDataProvider::TAG_NAME
        );
    }
}
```

Use shared data in frontend

```vue
<template>
    <div>shared data: {{ $page.props.foo }}</div>
</template>
```
