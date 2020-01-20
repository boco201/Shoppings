<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::get('/products', 'Admin\AdminProductsController@index')->name('admin.products.index');
        Route::get('/products/create', 'Admin\AdminProductsController@create')->name('admin.products.create');
        Route::post('/products', 'Admin\AdminProductsController@store')->name('admin.products.store');
        Route::get('/products/{product}/edit', 'Admin\AdminProductsController@edit')->name('admin.products.edit');
        Route::patch('/products/{product}', 'Admin\AdminProductsController@update')->name('admin.products.update');
        Route::delete('/products/{product}', 'Admin\AdminProductsController@destroy')->name('admin.products.destroy');
      
    });

    Route::group(['prefix' => 'orders'], function () {
   Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
   Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
});
});
