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

// Route::apiResources([
//     'tamanhos' => 'TamanhoController',
//     'sabores' => 'SaborController'
// ]);

Route::namespace('API')->name('api.')->group(function(){
    Route::get('/tamanhos', 'TamanhoController@index')->name('tamanhos');
});

// Route::get('/tamanhos', 'TamanhoController@showAll');
// Route::get('/tamanho/{idTamanhos}', 'TamanhoController@show');
// Route::post('/tamanhos', 'TamanhoController@create');
// Route::put('/tamanho/{id}', 'TamanhoController@edit');
// Route::delete('/tamanho/{id}', 'TamanhoController@destroy');

// Route::get('/sabores', 'SaborController@showAll');
// Route::post('/sabores', 'SaborController@create');
// Route::put('/sabor/{id}', 'SaborController@edit');
// Route::delete('/sabor/{id}', 'SaborController@destroy');

// Route::get('/adicionais', 'AdicionalController@showAll');
// Route::post('/adicionais', 'AdicionalController@create');
// Route::put('/adicional/{id}', 'AdicionalController@edit');
// Route::delete('/adicional/{id}', 'AdicionalController@destroy');

// Route::get('/pedidos', 'PedidoController@showAll');
// Route::post('/pedidos', 'PedidoController@create');
// Route::put('/pedido/{id}', 'PedidoController@edit');
// Route::delete('/pedido/{id}', 'PedidoController@destroy');