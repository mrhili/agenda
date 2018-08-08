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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Auth::routes();


Route::group(['middleware' => ['user']], function () {

	Route::get('/home', 'DashboardController@index')->name('home');
	Route::get('/adresses', 'AdressController@list')->name('adresses.list');
	Route::get('/adresses-data', 'AdressController@data')->name('adresses.data');
	Route::get('/store-adress', 'AdressController@store')->name('adresses.store');
	Route::get('/update-adress/{adress}', 'AdressController@update')->name('adresses.update');
	Route::get('/show-adress/{adress}', 'AdressController@show')->name('adresses.show');
	Route::get('/delete-adress/{adress}', 'AdressController@destroy')->name('adresses.delete');

});




