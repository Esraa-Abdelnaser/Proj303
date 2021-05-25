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

Route::post('/menu','RestoController@showMenu');

//show the details of order
Route::get('/', function () {
    return view('user.result');
});

Route::get('/', function () {
    return view('user.menu');
});

Route::get('/create_products', function () {
    return view('user.create_product');
});

Route::post('/storeProd','RestoController@storeProducts');

//show the details of order
Route::get('/calc', function () {
    return view('user.result');
});

Route::get('/num','RestoController@numOfOrders');

Route::get('/sign_out','RestoController@signOut');

Route::post('/delete_order','RestoController@deleteOrder');
