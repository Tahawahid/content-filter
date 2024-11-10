<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
    Route::get('/contact-us', [FrontendController::class, 'contact'])->name('frontend.contact');
    // Route::post('cart/add', [CartController::class, 'store'])->name('cart.add');
    // Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    // Route::delete('cart', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::resource('cart', CartController::class);
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
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
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
            // Route::patch('/orders/{order}/approve', [OrderController::class, 'approve'])->name('orders.approve');
            Route::resource('/orders', OrderController::class);
            Route::resource('/users', AdminUserController::class);
        });
    });
});
