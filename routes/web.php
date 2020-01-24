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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', 'Site\CheckoutController@getCheckout')->name('checkout');
    Route::post('/checkout/order', 'Site\CheckoutController@placeOrder')->name('checkout.place.order');

    Route::get('/paypalcheckout', 'Site\CheckoutController@paypalcheckout')->name('paypalcheckout');
    Route::post('/paypalcheckout/order', 'Site\CheckoutController@placeOrderPaypal')->name('checkout.place.order.paypal');

    Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');

    Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');

    Route::post('/products/comments', 'Site\CommentsController@store')->name('products.comments.store');

    Route::get('/products/comments/{product}', 'Site\CommentsController@show');
});

Route::get('/',  'Site\ProductsController@index')->name('site.products.index');

Route::get('/details/products/{product}-{slug}',  'Site\ProductsController@details')->name('site.products.details');

Route::get('/contact', 'Site\ContactFormController@create')->name('contact.create');
Route::post('/contact', 'Site\ContactFormController@store');

Route::get('/search', 'Site\ProductsController@search')->name('searchProducts');

Route::post('/cart-add', 'Site\CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'Site\CartController@cart')->name('site.products.cart');
Route::get('/cart-checkout/item/{id}/remove', 'Site\CartController@removeItem')->name('cart.remove');
Route::post('/cart-clear', 'Site\CartController@clear')->name('cart.clear');

Auth::routes();
require 'admin.php';


