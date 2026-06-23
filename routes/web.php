<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CouponController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Coupon;

Route::get('/', [ProductController::class, 'storeFront'])
    ->name('store.home');
Route::get('/dashboard', function () {
$latestOrders = Order::with('customer')
    ->latest()
    ->take(5)
    ->get();
    return view('dashboard', [

        'categoriesCount' => Category::count(),
        'productsCount' => Product::count(),
        'colorsCount' => Color::count(),
        'sizesCount' => Size::count(),

        'customersCount' => Customer::count(),
        'ordersCount' => Order::count(),
        'couponsCount' => Coupon::count(),
        'revenue' => Order::sum('total'),
        'latestOrders' => $latestOrders,
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
    '/orders',
    [CartController::class, 'orders']
)->name('orders.index');
Route::get(
    '/orders/{order}',
    [CartController::class, 'orderDetails']
)->name('orders.details');
Route::get(
    '/coupons',
    [CouponController::class, 'index']
)->name('coupons.index');

Route::get(
    '/coupons/create',
    [CouponController::class, 'create']
)->name('coupons.create');

Route::post(
    '/coupons/store',
    [CouponController::class, 'store']
)->name('coupons.store');

    });
    Route::get(
    '/product/{product}',
    [ProductController::class, 'showProduct']
)->name('store.product');
Route::get(
    '/customer-login',
    [CustomerAuthController::class, 'loginForm']
)->name('customer.login');

Route::post(
    '/customer-login',
    [CustomerAuthController::class, 'login']
)->name('customer.login.submit');
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

Route::delete(
    '/cart-item/{item}',
    [CartController::class, 'remove']
)->name('cart.remove');
Route::get('/customer-home', function () {

    return view('customer.home');

})->name('customer.home');

Route::get('/customer-products', function () {

    $products = Product::with('images')
        ->latest()
        ->get();

    return view(
        'customer.products',
        compact('products')
    );

})->name('customer.products');

Route::get(
    '/customer-product/{product}',
    [ProductController::class, 'showProduct']
)->name('customer.product');

Route::get('/customer-profile', function () {

    return view('customer.profile');

})->name('customer.profile');

Route::post(
    '/customer-profile/update',
    [CustomerController::class, 'updateProfile']
)->name('customer.profile.update');
Route::post(
    '/cart/add/{product}',
    [CartController::class, 'add']
)->name('cart.add');

Route::get(
    '/customer-cart',
    [CartController::class, 'index']
)->name('customer.cart');

Route::get(
    '/customer-addresses',
    [CustomerController::class, 'addresses']
)->name('customer.addresses');

Route::get(
    '/customer-addresses/create',
    [CustomerController::class, 'createAddress']
)->name('customer.addresses.create');

Route::post(
    '/customer-addresses/store',
    [CustomerController::class, 'storeAddress']
)->name('customer.addresses.store');

Route::delete(
    '/customer-addresses/{address}',
    [CustomerController::class, 'deleteAddress']
)->name('customer.addresses.delete');


});

require __DIR__.'/auth.php';
Route::resource('users', UserController::class);
Route::get(
    '/customers/{customer}/cart',
    [CustomerController::class, 'cart']
)->name('customers.cart');
Route::post(
    '/cart/increase/{item}',
    [CartController::class, 'increase']
)->name('cart.increase');

Route::post(
    '/cart/decrease/{item}',
    [CartController::class, 'decrease']
)->name('cart.decrease');
Route::post(
    '/checkout',
    [CartController::class, 'checkout']
)->name('checkout');
Route::post(
    '/coupon/check',
    [CouponController::class, 'check']
)->name('coupon.check');
Route::get(
    '/coupons/edit/{coupon}',
    [CouponController::class, 'edit']
)->name('coupons.edit');

Route::put(
    '/coupons/update/{coupon}',
    [CouponController::class, 'update']
)->name('coupons.update');

Route::delete(
    '/coupons/delete/{coupon}',
    [CouponController::class, 'destroy']
)->name('coupons.destroy');