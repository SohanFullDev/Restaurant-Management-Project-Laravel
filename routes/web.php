<?php



use App\Http\Controllers\Management\UserController;
use App\Http\Middleware\VerifyAdmin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Cashier\CashierController;
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

Route::get('/', 'HomeController@index');

Auth::routes(['register'=> false, 'reset'=> false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){


    Route::get('/cashier', 'Cashier\CashierController@index');
    Route::get('/cashier/getMenuByCategory/{category_id}','Cashier\CashierController@getMenuByCategory');

    Route::get('/cashier/getTable', 'Cashier\CashierController@getTables');
    Route::get('/cashier/getSaleDetailsByTable/{table_id}','Cashier\CashierController@getSaleDetailsByTable');

    Route::post('/cashier/orderFood', 'Cashier\CashierController@orderFood');
    Route::post('/cashier/deleteSaleDetail','Cashier\CashierController@deleteSaleDetail');


    Route::post('/cashier/confirmOrderStatus','Cashier\CashierController@confirmOrderStatus');
    Route::post('/cashier/savePayment','Cashier\CashierController@savePayment');
    Route::get('/cashier/showReceipt/{saleID}','Cashier\CashierController@showReceipt');

});

Route::middleware(['auth', 'VerifyAdmin'])->group(function(){

    Route::get('/management', function(){
        return view('management.index');
    });
    //management
    Route::resource('management/category','Management\CategoryController');
    Route::resource('management/menu','Management\MenuController');
    Route::resource('management/table','Management\TableController');
    Route::resource('management/user','Management\UserController');

    //report
    Route::get('/report','Report\ReportController@index');
    Route::get('/report/show', 'Report\ReportController@show');

    //export to excel
    Route::get('/report/show/export', 'Report\ReportController@export');


});
