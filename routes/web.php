<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/documentation', function () {
    return view('documentation');
});
Route::get('/cc', function () {
    Artisan::call('optimize:clear');

    return "Cache cleared successfully";
 });
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::get('/payment/{id}/{amount}', 'App\Http\Controllers\PaymentController@payment')->name('paymentMoyasar');
Route::get('/checkout/{id}', 'App\Http\Controllers\PaymentController@checkout')->name('checkout');

Route::get('/register', 'App\Http\Controllers\HomeController@index')->name('register');
Route::post('/register', 'App\Http\Controllers\HomeController@register')->name('register');

