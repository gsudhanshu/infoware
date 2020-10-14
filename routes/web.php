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

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{locale}', 'HomeController@lang');

Route::middleware(['auth'])->group(function() {
    //dashboard routes
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/save', 'HomeController@save')->name('save');

});