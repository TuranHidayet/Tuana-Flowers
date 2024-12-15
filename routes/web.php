<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FloristController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ShopController;



//Front Routes
Route::name('app.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        // Route::get('/about', 'about')->name('about');
        // Route::get('/cars', 'cars')->name('cars');
        // Route::get('/cars/{id}', 'car')->name('car');
        // Route::get('/contact', 'contact')->name('contact');
        // Route::get('/blogs', 'blogs')->name('blogs');
        // Route::post('/comment/{car_id}', 'comment')->name('comment')->middleware('auth');
    });
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(CategoryController::class)->prefix('categories')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(FloristController::class)->prefix('florists')->name('florists.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(ShopController::class)->prefix('shops')->name('shops.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
