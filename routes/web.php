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

Route::get('/', function () {
    return view('welcome');
});

/*****************************
*   Authentification routes  *
******************************/

Auth::routes();

Route::get('register-step2', 'Auth\RegisterStep2Controller@showForm');
Route::post('register-step2', 'Auth\RegisterStep2Controller@postForm')
  ->name('register.step2');

/*****************************
*         Other routes       *
******************************/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/burgers', 'BurgersController@index')->name('burgers');
Route::post('/burgers', 'BurgersController@createOrder')->name('burgers.store');
