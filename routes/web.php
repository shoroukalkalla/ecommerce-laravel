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
    Route::get('/redirect', 'redirect')->name('/redirect');
    Route::get('/product_details/{id}', 'product_details')->name('product_details');
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
});