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
	Route::get('/informations', 'AdressController@list')->name('adresses.list');
	Route::get('/informations-data', 'AdressController@data')->name('adresses.data');
	Route::post('/store-information', 'AdressController@store')->name('adresses.store');
	Route::put('/update-information/{adress}', 'AdressController@update')->name('adresses.update');
	Route::get('/show-information/{adress}', 'AdressController@show')->name('adresses.show');
	Route::delete('/delete-information/{adress}', 'AdressController@destroy')->name('adresses.delete');

});


Route::group(['middleware' => ['worker']], function () {



});


Route::group(['middleware' => ['admin']], function () {

  Route::get('/users/{role?}', 'AdminController@users')->name('users.list');
  Route::get('/add-user/{role?}', 'AdminController@addUser')->name('users.add');
  Route::post('/add-user', 'AdminController@addUserPost')->name('users.post');
  Route::put('/edit-user/{user}', 'AdminController@addUserEdit')->name('users.edit');
  Route::get('/show-user/{user}', 'UserController@showUser')->name('users.show');

});
