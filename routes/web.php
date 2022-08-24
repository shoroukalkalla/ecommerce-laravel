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

    Route::get('/', 'index');
    Route::post('/redirect', 'redirect');

});
Route::controller(AdminController::class)->group(function () {

    Route::get('/view_category', 'view_category');
    Route::post('/add_category', 'add_category');
    Route::get('/delete_category/{id}', 'delete_category');
});