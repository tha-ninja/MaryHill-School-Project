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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

#Users
Route::any('users','UserController@users')->name('users');
Route::post('user/store','UserController@storeUser')->name('user.store');
Route::any('user/staus/{id}','UserController@destroy');


#Manage
Route::any('/cases','HomeController@cases')->name('cases');
Route::any('case/store','HomeController@storeCase')->name('case.store');
Route::any('/get_case','HomeController@get_case');
Route::any('case/delete/{case_id}','HomeController@destroyCase');

//Merits
Route::get('merits','HomeController@merits')->name('merits');
Route::post('merit/store','HomeController@storeMerit')->name('merit.store');
Route::get('demerits','HomeController@demerits')->name('demerits');
Route::post('demerit/store','HomeController@storeDemerit')->name('demerit.store');