<?php

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

Auth::routes();

//Social logins
Route::get('oauth/{driver}', 'SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'SocialAuthController@handleProviderCallback')->name('social.callback');

//Home route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

//Public product routes
Route::get('/product/{product}', 'ProductController@show')->name('product.show');
Route::get('/products', 'ProductController@index')->name('product.index');



//Admin dashboard
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/products', 'AdminProductController@index')->name('admin.product.index');
    Route::get('/product', 'AdminProductController@create')->name('admin.product.create');
    Route::post('/product', 'AdminProductController@store')->name('admin.product.store');
    Route::delete('/product/{product}', 'AdminProductController@destroy')->name('admin.product.destroy');
    Route::get('/product/{product}/edit', 'AdminProductController@edit')->name('admin.product.edit');
    Route::put('/product/{product}', 'AdminProductController@update')->name('admin.product.update');
});

//Cart routes
Route::prefix('cart')->middleware('auth')->group(function() {
    Route::post('/add/{id}', 'CartController@add')->name('cart.add');
    Route::get('/', 'CartController@show')->name('cart.show');
    Route::post('/clear', 'CartController@clear')->name('cart.clear');
    Route::post('/product/{id}/increment', 'CartController@increment')->name('cart.product.increment');
    Route::post('/product/{id}/decrement', 'CartController@decrement')->name('cart.product.decrement');
});

//Orders
Route::get('/checkout', 'OrderController@checkout')->name('order.checkout');
Route::post('/charge', 'OrderController@charge')->name('order.charge');
Route::get('/orders', 'OrderController@index')->name('order.index');


