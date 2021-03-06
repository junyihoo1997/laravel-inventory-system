<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();



Route::get('/stock', 'StockController@view')->name('stock.view');
Route::get('/stock-create', 'StockController@createView')->name('stock.createView');
Route::post('/stock-create', 'StockController@create')->name('stock.create');
Route::get('/stock-edit/{stockId}', 'StockController@editView')->name('stock.editView');
Route::put('/stock-edit/{stockId}', 'StockController@edit')->name('stock.edit');
Route::get('/stock-delete/{stockId}', 'StockController@delete')->name('stock.delete');

Route::get('/service', 'ServiceController@view')->name('service.view');
Route::get('/service-create', 'ServiceController@createView')->name('service.createView');
Route::post('/service-create', 'ServiceController@create')->name('service.create');
Route::get('/service-edit/{serviceId}', 'ServiceController@editView')->name('service.editView');
Route::put('/service-edit/{serviceId}', 'ServiceController@edit')->name('service.edit');
Route::get('/service-delete/{serviceId}', 'ServiceController@delete')->name('service.delete');

Route::get('/customer', 'CustomerController@view')->name('customer.view');
Route::get('/customer-create', 'CustomerController@createView')->name('customer.createView');
Route::post('/customer-create', 'CustomerController@create')->name('customer.create');
Route::get('/customer-edit/{customerId}', 'CustomerController@editView')->name('customer.editView');
Route::put('/customer-edit/{customerId}', 'CustomerController@edit')->name('customer.edit');
Route::get('/customer-delete/{customerId}', 'CustomerController@delete')->name('customer.delete');




Route::get('/home', 'HomeController@index')->name('home');