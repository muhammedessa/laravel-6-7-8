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

Get , POST , PUT , DELETE
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('home' , function(){
    return 'Muhammed Essa Home';
});


Route::view('essa', 'index');
Route::get('hameed', 'HameedController@index');
Route::get('users/{id}', 'HameedController@show');
Route::get('sum/{id}', 'HameedController@sum');







Route::get('kirkuk', 'KirkukController@index');
Route::get('kirkuk/{id}', 'KirkukController@show');
