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

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/{any}', 'SpaController@index')->where('any', '.*');


Route::get('/{vue_capture?}', 'SpaController@index')->where('vue_capture', '[\/\w\.-]*');