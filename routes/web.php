<?php


use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\Management\CategoryController;



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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/management', function(){
    return view('management.index');
});

Route::get('/cashier', 'Cashier\CashierController@index');
Route::get('/cashier/getMenuByCategory/{category_id}','Cashier\CashierController@getMenuByCategory');

Route::get('/cashier/getTable', 'Cashier\CashierController@getTables');
Route::post('/cashier/orderFood', 'Cashier\CashierController@orderFood');


Route::resource('management/category','Management\CategoryController');
Route::resource('management/menu','Management\MenuController');
Route::resource('management/table','Management\TableController');
