<?php

use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FloristController as AdminFloristController;
use App\Http\Controllers\Admin\LastBannerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShopController as AdminShopController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FloristController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Front\ShopController;
use Illuminate\Support\Facades\Route;


//Front Routes
Route::name('app.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/show/{slug}', 'showProduct')->name('product_details');
    });

    Route::controller(ShopController::class)->group(function () {
        Route::get('/shops', 'index')->name('shops.index');
        Route::get('/shops/create', 'create')->name('shops.create')->middleware('auth');
        Route::post('/shops/store', 'store')->name('shops.store')->middleware('auth');
        Route::get('/shops/show/{slug}', 'show')->name('shops.show');
        Route::get('/shops/edit/{id}', 'edit')->name('shops.edit')->middleware('auth');
        Route::post('/shops/update/{id}', 'update')->name('shops.update');
        Route::get('/shops/destroy/{id}', 'destroy')->name('shops.destroy')->middleware('auth');
    });

    Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/products/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{slug}', 'show')->name('show');
        Route::get('/category/{categorySlug}', 'categoryShow')->name('app.category.index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact');
        Route::post('/contact/store', 'store')->name('contact.store');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::get('/comments', 'index')->name('comments');
        Route::post('/comments/store/{id}', 'store')->name('comments.store');
//        Route::get('/comments/show/{id}/{slug}', 'show')->name('comments.show');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'cartIndex')->name('cart.index'); // Səbət səhifəsini göstərir
        Route::post('/cart/add', 'addToCart')->name('cart.add'); // Məhsulu səbətə əlavə edir
        Route::get('/cart/items', 'getCartItems')->name('cart.items'); // Səbətdəki məhsulları JSON olaraq qaytarır
        Route::post('/cart/remove', 'removeFromCart')->name('cart.remove'); // Məhsulu səbətdən silir
        Route::post('/cart/complete', 'completeOrder')->name('cart.complete'); // Sifarişi tamamlayır
    });

    Route::controller(FloristController::class)->group(function () {
        Route::get('/florists', 'index')->name('florists');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'postRegister')->name('postRegister');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'postLogin')->name('postLogin');
        Route::get('/profile', 'profile')->name('profile')->middleware('auth');
        Route::get('/logout', 'logout')->name('logout');
    });
});



// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
        Route::post('/users/{id}/make-admin', 'makeAdmin')->name('makeAdmin');
    });

    Route::controller(AdminContactController::class)->prefix('contact')->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/show/{id}', 'show')->name('show');
        Route::get('/read/{id}', 'read')->name('read');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(CategoryController::class)->prefix('categories')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/change/{id}', 'change')->name('change');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(SliderController::class)->prefix('sliders')->name('slider.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(LastBannerController::class)->prefix('banners')->name('banner.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
    });

    Route::controller(AdminProductController::class)->prefix('products')->name('products.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(AdminFloristController::class)->prefix('florists')->name('florists.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(AdminShopController::class)->prefix('shops')->name('shops.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{id}', 'show')->name('show');
    });
});


