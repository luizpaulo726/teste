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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//$this->apiResource('products', 'Api\ProductController');
Route::post('/login', 'Api\LoginController@verificarUsuario');


Route::post('/usuarios', 'Api\UsuarioController@store');
Route::put('/usuarios', 'Api\UsuarioController@update');
Route::get('/usuarios', 'Api\UsuarioController@index');