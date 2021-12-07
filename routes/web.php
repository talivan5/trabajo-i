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
Route::view('estacions','estacion');
Route::view('poblacion','poblacion');
Route::view('sensors','sensors');
Route::get('/vision-mision', 'EstacionController@VisionMision');
Route::get('/quienes-somos', 'EstacionController@QuienesSomos');
Route::get('/historia', 'EstacionController@historia')->name('historia');
