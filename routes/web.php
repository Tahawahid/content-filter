<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
    Route::get('/contact-us', [FrontendController::class, 'contact'])->name('frontend.contact');
    Route::get('/sign-up', [FrontendController::class, 'signUp'])->name('frontend.sign-up');
    Route::get('/sign-in', [FrontendController::class, 'signIn'])->name('frontend.sign-in');
    Route::get('/forget-password', [FrontendController::class, 'forgetPassword'])->name('frontend.forget-password');
});

// Admin Routes
Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'home'])->name('dashboard.admin.home');
    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard.admin.home');
});
