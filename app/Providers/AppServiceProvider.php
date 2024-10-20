<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        // frontend components
        Blade::component('frontend.components.layout', 'layout');
        Blade::component('frontend.components.head', 'head');
        Blade::component('frontend.components.preloader', 'preloader');
        Blade::component('frontend.components.nav', 'nav');
        Blade::component('frontend.components.nav-link', 'nav-link');
        Blade::component('frontend.components.foot', 'foot');
        Blade::component('frontend.components.footer', 'footer');


        // Dashboard Componenets
        Blade::component('dashboard.components.head', 'd-head');
        Blade::component('dashboard.components.layout', 'd-layout');
        Blade::component('dashboard.components.navbar', 'd-navbar');
        Blade::component('dashboard.components.layout', 'd-layout');
        Blade::component('dashboard.components.spinner', 'spinner');
        Blade::component('dashboard.components.sidebar', 'd-sidebar');
        Blade::component('dashboard.components.foot', 'd-foot');
        Blade::component('dashboard.components.footer', 'd-footer');
    }
}
