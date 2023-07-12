<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        view()->composer('public.layout.nav', function ($view) {
            $view->with('routes', [
                    'categories',
                    'category.show',
                    'courses',
                    'course.show',
                    'contact'
                ]
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
