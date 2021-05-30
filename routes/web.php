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

// ده لينك بيوديني للصفحة الرئيسية
Route::get('/mas', function () {
    return view('user.master');
});


//store Sign up of customers
Route::post('/store_customers', 'RestoController@storeCustomers');

//Check signin
Route::post('/signin', 'RestoController@checkSignin');

//store the order
Route::post('/store_order', 'RestoController@save_order');

//calculate the order
Route::post('/calc', 'RestoController@count');

// show menu
Route::post('/menu', 'RestoController@showMenu');

// route for view admin to create product
Route::get('/create_products', function () {
    return view('user.create_product');
});

// create product
Route::post('/storeProd', 'AdminController@storeProducts');

// route for view admin to update product
Route::get('/update_products', function () {
    return view('user.update_product');
});

// update product
Route::post('/updateProd', 'AdminController@updateProducts');

Route::post('/dataOfProduct', 'AdminController@getDataOfProduct');

Route::post('/deleteProduct', 'AdminController@deleteProduct');

//show the details of order
Route::get('/result', function () {
    return view('user.result');
});

// route for sign out
Route::get('/sign_out', 'RestoController@signOut');

// route for after ordering delete all products of user
Route::post('/delete_allorders', 'RestoController@deleteallOrders');

// route for customer for delete one order
Route::post('/delete_order', 'RestoController@deleteOrder');
