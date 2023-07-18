<?php


use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Management\MenuController;
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

Route::get('/cashier', function(){
    return view('cashier.index');

});

Route::resource('management/category','Management\CategoryController');
Route::resource('management/menu','Management\MenuController');
Route::resource('management/table','Management\TableController');
