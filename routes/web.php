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

//contact us
    Route::get('/contact/create', 'MessageController@create')->name('contact.create');
    Route::post('/contact', 'MessageController@store')->name('contact.store');


//Public product routes
    Route::get('/products/{product}', 'ProductController@show')->name('product.show');
    Route::any('/products', 'ProductController@index')->name('product.index');
//Route::post('/products/search', 'ProductController@search')->name('product.search');


//Admin dashboard
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
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

        //Report routes
        Route::prefix('reports')->group(function() {
            Route::get('/', 'ReportController@index')->name('admin.report.index');
            Route::get('/generate', 'ReportController@generate')->name('admin.report.generate');
        });

        //Contact route
        Route::get('/contacts', 'MessageController@index')->name('contact.index');
        Route::get('/contacts/{contact}', 'MessageController@show')->name('contact.show');
        Route::delete('/contacts/{contact}', 'MessageController@destroy')->name('contact.destroy');

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


    Route::middleware('auth')->group(function() {
        //Orders
        Route::get('/checkout', 'OrderController@checkout')->name('order.checkout');
        Route::post('/charge', 'OrderController@charge')->name('order.charge');
        Route::get('/orders', 'OrderController@index')->name('order.index');

        //Review
        Route::post('/products/{product}/reviews', 'ReviewController@store')->name('product.review.store');
    });




