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

Route::get('/', 'SearchController@index');
Route::get('filter', 'SearchController@filter')->name('filter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register-art', 'SearchController@store')->name('register-art');
Route::get('listar', 'SearchController@show')->name('listar');
