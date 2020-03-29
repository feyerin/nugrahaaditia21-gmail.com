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

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();
Route::group(['middleware'=>'auth'], function(){
    //-----------------
    Route::get('/api/order/check-session', 'Order\OrderController@checkSession');

    Route::get('/api/order/get-by-user', 'Order\OrderController@getOrderByUser');
    
    Route::get('/api/order/get-cart', 'Order\OrderController@getCart');

    Route::post('/api/order/add-to-cart', 'Order\OrderController@addToCart');
    
    Route::post('/api/order/update-cart', 'Order\OrderController@updateCart');
    
    Route::get('/api/order/checkout', 'Order\OrderController@checkout');

    Route::post('/api/order/set-user-data', 'Order\OrderController@setUserData');
    //-----------------

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/web', 'Customer\CustomerController@indexCustomer');
    // Route::get('/web/product', 'Customer\CustomerController@indexCustomer'); LIST PRODUCT
    Route::get('/web/product/detail/{id}', 'Customer\CustomerController@readProduct');
    // Route::get('/web/cart', 'Customer\CustomerController@readProduct');

    Route::get('/dashboard/product', 'Dashboard\DashboardController@indexProduct');
    Route::get('/dashboard/order', 'Dashboard\DashboardController@indexOrder');
    Route::get('/product/add', 'Dashboard\DashboardController@addProduct');
    Route::get('/product/detail/{id}', 'Dashboard\DashboardController@readProduct');
});
