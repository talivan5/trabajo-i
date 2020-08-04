<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('store', 'api\ProvinciaController@store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/registrar', 'ProvinciaController@nuevo')->name('registrar');
Route::get('/editar', 'ProvinciaController@editar')->name('editar');
Route::get('/provincias', 'ProvinciaController@index')->name('provincia');


//Route::get('/usuarios', 'UsuarioController@index')->name('usuario');
Route::apiResource('usuarios', 'UsuarioController');