<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::group(['middleware' => 'jwt.auth'], function(){
	Route::get('auth/user', 'AuthController@user');
	Route::post('auth/logout', 'AuthController@logout');
});
Route::group(['middleware' => 'jwt.refresh'], function(){
	Route::get('auth/refresh', 'AuthController@refresh');
});

Route::namespace('API')->name('api.')->group(function(){
    // Tamanho
    Route::get('/tamanhos', 'TamanhoController@index')->name('tamanhos');
    Route::get('/tamanho/{id}', 'TamanhoController@find');
    // Sabores
    Route::get('/sabores', 'SaborController@showAll')->name('sabores');
    Route::get('/sabor/{id}', 'SaborController@find');
    // Adicionais
    Route::get('/adicionais', 'AdicionalController@showAll')->name('adicionais');
    Route::get('/adicionais_pedido/{id}', 'AdicionalController@findAdicionaisbyPedido');
    // Pedido
    Route::post('/pedido/create', 'PedidoController@store');
    Route::get('/pedido/{id}', 'PedidoController@find');
    Route::get('/pedido/edit/{id}', 'PedidoController@edit');
    Route::post('/pedido/update/{id}', 'PedidoController@update');
    Route::delete('/pedido/delete/{id}', 'PedidoController@delete');
    Route::get('/pedidos', 'PedidoController@showAll');
    Route::get('/pedidoscomadicionais', 'PedidoController@pedidoscomadicionais');
});