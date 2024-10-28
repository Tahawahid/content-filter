<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
    Route::get('/contact-us', [FrontendController::class, 'contact'])->name('frontend.contact');
});
Route::prefix('account')->group(function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/sign-in', [AuthController::class, 'signIn'])->name('frontend.signIn');
        Route::get('/sign-up', [AuthController::class, 'signUp'])->name('frontend.signUp');
        Route::get('/forget-password', [FrontendController::class, 'forgetPassword'])->name('frontend.forgetPassword');
        Route::post('/login', [AuthController::class, 'userLogin'])->name('frontend.userLogin');
        Route::post('/register', [AuthController::class, 'userRegister'])->name('frontend.userRegister');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard.client.home');
        Route::get('/logout', [AuthController::class, 'logout'])->name('frontend.userLogout');
    });

    Route::prefix('admin')->group(function () {

        Route::group(['middleware' => 'admin.guest'], function () {
            Route::get('/sign-in', [AdminAuthController::class, 'signIn'])->name('dashboard.admin.signin');
            Route::post('/login', [AdminAuthController::class, 'login'])->name('dashboard.admin.login');
        });

        Route::group(['middleware' => 'admin.auth'], function () {
            Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard.admin.home');
            Route::resource('/packages', PackagesController::class);
            Route::get('/logout', [AdminAuthController::class, 'logout'])->name('dashboard.admin.logout');
        });
    });
});
