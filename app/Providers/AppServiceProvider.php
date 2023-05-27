<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::directive('input', function ($expression) {
            $data = $this->parametersConversion($expression);

            return view('Layouts.Partials.Directives.input', $data);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }

    protected function parametersConversion($expression)
    {
        $values = explode(',', $expression);

        return [
            'label' => $values[0] ?? null,
            'type' => $values[1] ?? null,
            'value' => $values[2] ?? null,
            'placeholder' => $values[3] ?? null,
            'readonly' => $values[4] ?? null,
        ];
    }
}
