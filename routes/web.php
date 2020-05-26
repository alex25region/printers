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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'Front\FrontController@index');
Route::get('/test', 'Front\FrontController@test')->name('test');
//Route::resource('front', 'Front\FrontController')->names('front');

Auth::routes([
    'reset' => false,
    'verify' => false,
    'register' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');


$groupData = [
    'namespace' => 'AdminPanel',
    'prefix' => 'admin'
];

Route::group($groupData, function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('printers', 'PrinterController')->names('admin.printers');
    Route::resource('models', 'ModelPrinterController')->names('admin.models');

});

