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


        //Admin Dashboard Componenets
        Blade::component('dashboard.admin.components.head', 'd-head');
        Blade::component('dashboard.admin.components.layout', 'd-layout');
        Blade::component('dashboard.admin.components.navbar', 'd-navbar');
        Blade::component('dashboard.admin.components.spinner', 'spinner');
        Blade::component('dashboard.admin.components.sidebar', 'd-sidebar');
        Blade::component('dashboard.admin.components.foot', 'd-foot');
        Blade::component('dashboard.admin.components.footer', 'd-footer');

        // Customer Dashboard Componenets
        Blade::component('dashboard.client.components.head', 'c-head');
        Blade::component('dashboard.client.components.layout', 'c-layout');
        Blade::component('dashboard.client.components.navbar', 'c-navbar');
        Blade::component('dashboard.client.components.spinner', 'c-spinner');
        Blade::component('dashboard.client.components.sidebar', 'c-sidebar');
        Blade::component('dashboard.client.components.foot', 'c-foot');
        Blade::component('dashboard.client.components.footer', 'c-footer');
    }
}
