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

Route::get('/',  'Site\ProductsController@index')->name('site.products.index');

Route::get('/details/products/{product}',  'Site\ProductsController@details')->name('site.products.details');

Route::get('/stripecheckout', 'Site\CheckoutController@stripeCheckout')->name('site.products.stripe');
Route::post('/stripecheckout/order', 'Site\CheckoutController@placeOrderStripe')->name('checkout.place.order.stripe');

Route::get('/checkout/products',  'Site\CheckoutController@getCheckout')->name('site.products.checkout');
Route::post('/checkout/products/create',  'Site\CheckoutController@storeCheckout')->name('site.products.store');

Route::get('checkout/payment/complete', 'Site\CheckoutController@complete')->name('checkout.payment.complete');

Route::get('account/orders', 'Site\AccountController@getOrders')->name('account.orders');

Route::post('/cart-add', 'Site\CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'Site\CartController@cart')->name('site.products.cart');
Route::get('/cart-checkout/item/{id}/remove', 'Site\CartController@removeItem')->name('cart.remove');
Route::post('/cart-clear', 'Site\CartController@clear')->name('cart.clear');

Auth::routes();
require 'admin.php';


