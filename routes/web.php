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

//Review
Route::post('/product/{product}/reviews', 'ReviewController@store')->name('product.review.store');


//Admin dashboard
Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.home');

    //Product routes
    Route::get('/products', 'AdminProductController@index')->name('admin.product.index');
    Route::get('/products/create', 'AdminProductController@create')->name('admin.product.create');
    Route::post('/products', 'AdminProductController@store')->name('admin.product.store');
    Route::delete('/products/{product}', 'AdminProductController@destroy')->name('admin.product.destroy');
    Route::get('/products/{product}/edit', 'AdminProductController@edit')->name('admin.product.edit');
    Route::put('/products/{product}', 'AdminProductController@update')->name('admin.product.update');

    //Category routes
    Route::get('/categories', 'CategoryController@index')->name('admin.category.index');
    Route::get('/categories/create', 'CategoryController@create')->name('admin.category.create');
    Route::post('/categories', 'CategoryController@store')->name('admin.category.store');
    Route::delete('/categories/{category}', 'CategoryController@destroy')->name('admin.category.destroy');
    Route::put('/categories/{category}', 'CategoryController@update')->name('admin.category.update');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('admin.category.edit');

    //Chart routes
    Route::prefix('charts')->group(function() {
        Route::get('/', 'ChartController@index')->name('admin.chart.index');
        Route::get('/users', 'ChartController@users')->name('admin.chart.users');
        Route::get('/products', 'ChartController@products')->name('admin.chart.products');
        Route::get('/sales', 'ChartController@sales')->name('admin.chart.sales');
    });


});

//Cart routes
Route::prefix('cart')->middleware('auth')->group(function() {
    Route::post('/add/{id}', 'CartController@add')->name('cart.add');
    Route::get('/', 'CartController@show')->name('cart.show');
    Route::post('/clear', 'CartController@clear')->name('cart.clear');
    Route::post('/{id}/increment', 'CartController@increment')->name('cart.product.increment');
    Route::post('/{id}/decrement', 'CartController@decrement')->name('cart.product.decrement');
    Route::delete('/{id}', 'CartController@delete')->name('cart.product.delete');
});

//Orders
Route::get('/checkout', 'OrderController@checkout')->name('order.checkout');
Route::post('/charge', 'OrderController@charge')->name('order.charge');
Route::get('/orders', 'OrderController@index')->name('order.index');


