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
    return view('index');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::view('usuarios','usuarios');
Route::view('provincias','provincias');
Route::view('noticias','noticias');
Route::get('/vision-mision', 'ProvinciaController@VisionMision');
Route::get('/quienes-somos', 'ProvinciaController@QuienesSomos');
Route::get('/historia', 'ProvinciaController@historia')->name('historia');
