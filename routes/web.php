<?php

use Illuminate\Support\Facades\Route;
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
// Route::get('/phpinfo',function(){
//     return phpinfo();

// });
Route::get('/','HomeController@home')->name('home');
Route::get('/auth/registration','AuthController@getRegister')->name('getRegister');
Route::post('/auth/registration','AuthController@postRegister')->name('postRegister');
Route::post('/auth/check_email_unique','AuthController@check_email_unique')->name('check_email_unique');

Route::get('/auth/login','AuthController@getLogin')->name('getLogin');
Route::post('/auth/login','AuthController@postLogin')->name('postLogin');
Route::get('/dashboard','ProfileController@dashboard')->name('dashboard');

Route::post('/image-store','ImageController@storeImage')->name('image-store');