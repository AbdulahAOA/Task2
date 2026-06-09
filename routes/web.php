<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerAuthController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
Route::get('/', [ProductController::class, 'storeFront'])
    ->name('store.home');
Route::get('/dashboard', function () {

    return view('dashboard', [
        'categoriesCount' => Category::count(),
        'productsCount' => Product::count(),
        'colorsCount' => Color::count(),
        'sizesCount' => Size::count(),
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Category Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    /*
    |--------------------------------------------------------------------------
    | Color Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
    Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create');
    Route::post('/colors/store', [ColorController::class, 'store'])->name('colors.store');
    Route::get('/colors/edit/{color}', [ColorController::class, 'edit'])->name('colors.edit');
    Route::put('/colors/update/{color}', [ColorController::class, 'update'])->name('colors.update');
    Route::delete('/colors/delete/{color}', [ColorController::class, 'destroy'])->name('colors.destroy');

    /*
    |--------------------------------------------------------------------------
    | Size Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/sizes', [SizeController::class, 'index'])->name('sizes.index');
    Route::get('/sizes/create', [SizeController::class, 'create'])->name('sizes.create');
    Route::post('/sizes/store', [SizeController::class, 'store'])->name('sizes.store');
    Route::get('/sizes/edit/{size}', [SizeController::class, 'edit'])->name('sizes.edit');
    Route::put('/sizes/update/{size}', [SizeController::class, 'update'])->name('sizes.update');
    Route::delete('/sizes/delete/{size}', [SizeController::class, 'destroy'])->name('sizes.destroy');

    /*
    |--------------------------------------------------------------------------
    | Product Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get(
    '/product/{product}',
    [ProductController::class, 'showProduct']
)->name('store.product');
    });
    Route::get(
    '/customer-register',
    [CustomerAuthController::class, 'registerForm']
)->name('customer.register.form');

Route::post(
    '/customer-register',
    [CustomerAuthController::class, 'register']
)->name('customer.register');
Route::get(
    '/customers',
    [CustomerController::class, 'index']
)->name('customers.index');

Route::post(
    '/customer-logout',
    [CustomerAuthController::class, 'logout']
)->name('customer.logout');

Route::middleware('auth:customer')->group(function () {

    Route::get('/customer-home', function () {

        return view('customer.home');

    })->name('customer.home');

    Route::get('/customer-products', function () {

        $products = Product::latest()->get();

        return view(
            'customer.products',
            compact('products')
        );

    })->name('customer.products');

    Route::get('/customer-profile', function () {

        return view('customer.profile');

    })->name('customer.profile');

});
Route::get('/customer-login', function () {

    return view('customer.login');

})->name('customer.login');
require __DIR__.'/auth.php';
Route::resource('users', UserController::class);