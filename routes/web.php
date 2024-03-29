<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/blog', function () {
    return view('client.blog');
});

Route::get('/check_out', [HomeController::class, 'check_out']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::middleware(['auth', 'authadmin'])->group(function () {
    // Categories
    Route::get('/view_category', [AdminController::class, 'view_category']);
    Route::post('/add_category', [AdminController::class, 'add_category']);
    Route::get('/update_category_view/{id}', [AdminController::class, 'update_category_view']);
    Route::post('/update_category/{id}', [AdminController::class, 'update_category']);
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
    // Products
    Route::get('/view_product', [AdminController::class, 'view_product']);
    Route::post('/add_product', [AdminController::class, 'add_product']);
    Route::get('/list_product', [AdminController::class, 'list_product']);
    Route::get('/update_product_view/{id}', [AdminController::class, 'update_product_view']);
    Route::post('/update_product/{id}', [AdminController::class, 'update_product']);
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
    //Orders
    Route::get('/order_admin', [AdminController::class, 'order_admin']);
    Route::post('/delivered/{id}', [AdminController::class, 'delivered']);
    //Send Email
    Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
    Route::post('/send_email_user/{id}', [AdminController::class, 'send_email_user']);
    //Search order
    Route::get('/search', [AdminController::class, 'search']);
});

// Product Details
Route::get('/product_detail/{id}', [HomeController::class, 'product_detail']);
// Filter Product by Category
Route::get('/product_by_category/{category_name}', [HomeController::class, 'product_by_category']);
// Cart
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']); // Add to cart
Route::get('/show_cart', [HomeController::class, 'show_cart']); // Show cart
Route::post('/update_cart', [HomeController::class, 'update_cart']); // Show cart
Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']); // Delete products in cart
Route::get('/cart_destroy', [HomeController::class, 'cart_destroy']); // Delete products in cart
Route::post('/cash_order', [HomeController::class, 'cash_order']); // Cash order
//Search Product
Route::get('/search_product', [HomeController::class, 'search_product']);
//Search Product Shop
Route::get('/search_product_shop', [HomeController::class, 'search_product_shop']);
//Order Clients
Route::get('/order', [HomeController::class, 'order']);
Route::get('/cancel/{id}', [HomeController::class, 'cancel']);
//Comment
Route::post('/comment/{id}', [HomeController::class, 'comment']);
// Login Google
Route::get('auth/google', [HomeController::class,'googlepage']);
Route::get('auth/google/callback', [HomeController::class,'googlecallback']);
// Stripe
Route::get('/cash_order', [HomeController::class,'cash_order']);

Route::get('/stripe/{total}', [HomeController::class,'stripe']);

Route::post('stripe/{total}',[HomeController::class,'stripePost'])->name('stripe.post');
