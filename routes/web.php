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
    return view('/produtos');
});

Route::post('/processa','ProdutoController@import');
Route::get('/editar/{id}','ProdutoController@edit');
Route::get('/deletar/{id}','ProdutoController@destroy');
Route::post('/produtos/{id}','ProdutoController@update');


