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
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:0,1,2']], function () {
  Route::resource('home', 'HomeController');
});

Route::group(['middleware' => ['auth', 'checkRole:0']], function () {
  Route::resource('admin', 'AdminController');
});

Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
  Route::get('/editProfile', 'ProfileController@editProfile');
  Route::get('/changePassword', 'ProfileController@changePw');
  Route::post('/storePicture', 'ProfileController@storePicture');
  Route::post('/changepw', 'ProfileController@changePassword');
  Route::resource('premium', 'PremiumController');
  Route::resource('barang', 'BarangController');
  Route::resource('profile', 'ProfileController');
  Route::resource('kasir', 'KasirController');
  Route::resource('statistik', 'StatistikController');
});
