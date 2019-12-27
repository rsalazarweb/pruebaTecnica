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

//PRUEBAS
Route::get('/pruebas', 'PruebasController@index');
Route::get('/test-orm', 'PruebasController@testOrm');

//rutas controlador de usuarios
Route::post('/api/register', 'UsuariosController@register');



