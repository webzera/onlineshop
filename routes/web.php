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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//role admin///////////
Route::get('/admin', 'Admin\AdminController@index')->name('admin::home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {
 \UniSharp\LaravelFilemanager\Lfm::routes();
 });

 // role admin end///////

//admin
Route::get('/admin/customer', 'Admin\CustomerController@index')->name('admin.customer');
Route::get('/admin/order', 'Admin\AdminorderController@index')->name('admin.order');
Route::resource('admin/product', 'Admin\ProductController');

//admin end

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

Route::get('/productview', 'ProductController@productview')->name('productview');
Route::get('/details/{product:slug}/', 'ProductController@productdetail')->name('productdetail');

Route::resource('order', 'OrderController');


// Route::get('/closure', 'CheckoutController@closure');










































// Route::get('/closure', 'CheckoutController@closure');
