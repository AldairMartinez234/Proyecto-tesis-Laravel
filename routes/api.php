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


    Route::post('register', 'AuthController@register');
     Route::post('login', 'AuthController@login');
     Route::post('refresh', 'AuthController@refresh');

Route::get('vista_paciente','VistapacientesController@index');

Route::get('usuarios','AuthController@index');

Route::get('vista_municipios','VistapacientesController@municipios');

Route::get('vista_muni/{muni}','VistapacientesController@muni');

Route::get('paciente/{id}','VistapacientesController@paciente');

Route::get('paciente/entregados/{id}/{codigo_entrega}','VistapacientesController@entregados');

Route::get('paciente/busquedad/{name}','VistapacientesController@busquedad');

Route::middleware('auth:api')->group(function () {
	Route::post('logout' , 'AuthController@logout');
});

