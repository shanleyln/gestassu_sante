<?php

namespace App\Providers;

use App\Auth\ApiUserProvider;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            $view->with('version_test', Session::get('version_test', false));
        });

        $this->app['auth']->provider('api-user', function ($app, array $config) {
            return new ApiUserProvider();
        });
    }
}
