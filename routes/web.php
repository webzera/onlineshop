<?php

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
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::redirect('/home', '')->name('home');

Auth::routes();

Route::get('/', 'ProductController@index')->name('home');

Route::get('/home', 'ProductController@index')->name('home');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::resource('order', 'OrderController');