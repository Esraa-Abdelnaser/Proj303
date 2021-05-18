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

Route::get('/show', function () {
    return view('user.show');
});

Route::get('/mas', function () {
    return view('user.master');
});

//store Sign up of customers
Route::post('/store_customers','RestoController@storeCustomers');
//Check signin
Route::post('/signin','RestoController@checkSignin');

//store the order
Route::post('/store_order', 'RestoController@save_order');

//calculate the order
Route::post('/calc','RestoController@count');

//show the details of order
Route::get('/', function () {
    return view('user.result');
});

Route::get('/num','RestoController@numOfOrders');
