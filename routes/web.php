<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
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

Route::resource('/category','CategoryController');

Route::get('/product/product_price/{slug}','ProductController@price')->name('product.price');

Route::get('/product/individual/{id}','ProductController@individual')->name('product.individual');
Route::post('/product/add/{id}','ProductController@add')->name('product.add');
Route::post('/product/sub/{id}','ProductController@sub')->name('product.sub');
Route::resource('/product','ProductController');


Route::resource('/customer','CustomerController');
Route::get('/sale/categories/{id}','SaleController@products');
Route::resource('/sale','SaleController');
