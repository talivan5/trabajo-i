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
Route::get('/usuarios', 'UsuarioController@index')->name('usuario');
Route::get('/registrar', 'ProvinciaController@nuevo')->name('registrar');
Route::get('/provincias', 'ProvinciaController@index')->name('provincia');
