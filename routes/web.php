<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('/redirect', 'redirect')->name('/redirect')->middleware('auth', 'verified');

    Route::get('/product_details/{id}', 'product_details')->name('product_details');

    Route::post('/add_to_cart/{id}', 'add_to_cart')->name('add_to_cart');
    Route::get('/show_cart', 'show_cart')->name('show_cart');
    Route::get('/remove_cart/{id}', 'remove_cart')->name('remove_cart');
    Route::get('/cash_order', 'cash_order')->name('cash_order');

    Route::get('/stripe/{totalPrice}', 'stripe')->name('stripe');
    Route::post('stripe/{totalPrice}', 'stripePost')->name('stripe.post');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/view_category', 'view_category')->name('view_category');
    Route::post('/add_category', 'add_category')->name('add_category');
    Route::get('/delete_category/{id}', 'delete_category')->name('delete_category');

    Route::get('/view_product', 'view_product')->name('view_product');
    Route::post('/add_product', 'add_product')->name('add_product');
    Route::get('/show_product', 'show_product')->name('show_product');
    Route::get('/edit_product/{id}', 'edit_product')->name('edit_product');
    Route::post('/update_product/{id}', 'update_product')->name('update_product');
    Route::get('/delete_product/{id}', 'delete_product')->name('delete_product');

    Route::get('/order', 'order')->name('order');
    Route::get('/delivered_order/{id}', 'delivered')->name('delivered');

    Route::get('/print_pdf/{id}', 'print_pdf')->name('print_pdf');

    Route::get('/send_email/{id}', 'send_email')->name('send_email');
    Route::post('/send_user_email/{id}', 'send_user_email')->name('send_user_email');

    Route::get('/search', 'search')->name('search');

});