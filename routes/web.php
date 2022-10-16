<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'animais', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'animais', 'uses'=>"\App\Http\Controllers\AnimalController@index"]);
        Route::get('create', ['as'=>'animais.create', 'uses'=>"\App\Http\Controllers\AnimalController@create"]);
        Route::post('store', ['as'=>'animais.store', 'uses'=>"\App\Http\Controllers\AnimalController@store"]);
        Route::get('{id}/destroy', ['as'=>'animais.destroy', 'uses'=>"\App\Http\Controllers\AnimalController@destroy"]);
        Route::get('{id}/edit', ['as'=>'animais.edit', 'uses'=>"\App\Http\Controllers\AnimalController@edit"]);
        Route::put('{id}/update', ['as'=>'animais.update', 'uses'=>"\App\Http\Controllers\AnimalController@update"]);
    });

    Route::group(['prefix'=>'racas', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'racas', 'uses'=>"\App\Http\Controllers\RacaController@index"]);
        Route::get('create', ['as'=>'racas.create', 'uses'=>"\App\Http\Controllers\RacaController@create"]);
        Route::post('store', ['as'=>'racas.store', 'uses'=>"\App\Http\Controllers\RacaController@store"]);
        Route::get('{id}/destroy', ['as'=>'racas.destroy', 'uses'=>"\App\Http\Controllers\RacaController@destroy"]);
        Route::get('{id}/edit', ['as'=>'racas.edit', 'uses'=>"\App\Http\Controllers\RacaController@edit"]);
        Route::put('{id}/update', ['as'=>'racas.update', 'uses'=>"\App\Http\Controllers\RacaController@update"]);
    });

    Route::group(['prefix'=>'vacinas', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'vacinas', 'uses'=>"\App\Http\Controllers\VacinaController@index"]);
        Route::get('create', ['as'=>'vacinas.create', 'uses'=>"\App\Http\Controllers\VacinaController@create"]);
        Route::post('store', ['as'=>'vacinas.store', 'uses'=>"\App\Http\Controllers\VacinaController@store"]);
        Route::get('{id}/destroy', ['as'=>'vacinas.destroy', 'uses'=>"\App\Http\Controllers\VacinaController@destroy"]);
        Route::get('{id}/edit', ['as'=>'vacinas.edit', 'uses'=>"\App\Http\Controllers\VacinaController@edit"]);
        Route::put('{id}/update', ['as'=>'vacinas.update', 'uses'=>"\App\Http\Controllers\VacinaController@update"]);
    });

    Route::group(['prefix'=>'dietas', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'dietas', 'uses'=>"\App\Http\Controllers\DietaController@index"]);
        Route::get('create', ['as'=>'dietas.create', 'uses'=>"\App\Http\Controllers\DietaController@create"]);
        Route::post('store', ['as'=>'dietas.store', 'uses'=>"\App\Http\Controllers\DietaController@store"]);
        Route::get('{id}/destroy', ['as'=>'dietas.destroy', 'uses'=>"\App\Http\Controllers\DietaController@destroy"]);
        Route::get('{id}/edit', ['as'=>'dietas.edit', 'uses'=>"\App\Http\Controllers\DietaController@edit"]);
        Route::put('{id}/update', ['as'=>'dietas.update', 'uses'=>"\App\Http\Controllers\DietaController@update"]);
    });

    Route::group(['prefix'=>'pastagens', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'pastagens', 'uses'=>"\App\Http\Controllers\PanstagemController@index"]);
        Route::get('create', ['as'=>'pastagens.create', 'uses'=>"\App\Http\Controllers\PanstagemController@create"]);
        Route::post('store', ['as'=>'pastagens.store', 'uses'=>"\App\Http\Controllers\PanstagemController@store"]);
        Route::get('{id}/destroy', ['as'=>'pastagens.destroy', 'uses'=>"\App\Http\Controllers\PanstagemController@destroy"]);
        Route::get('{id}/edit', ['as'=>'pastagens.edit', 'uses'=>"\App\Http\Controllers\PanstagemController@edit"]);
        Route::put('{id}/update', ['as'=>'pastagens.update', 'uses'=>"\App\Http\Controllers\PanstagemController@update"]);
    });

    Route::group(['prefix'=>'gestacoes', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'gestacoes', 'uses'=>"\App\Http\Controllers\GestacaoController@index"]);
        Route::get('create', ['as'=>'gestacoes.create', 'uses'=>"\App\Http\Controllers\GestacaoController@create"]);
        Route::post('store', ['as'=>'gestacoes.store', 'uses'=>"\App\Http\Controllers\GestacaoController@store"]);
        Route::get('{id}/destroy', ['as'=>'gestacoes.destroy', 'uses'=>"\App\Http\Controllers\GestacaoController@destroy"]);
        Route::get('{id}/edit', ['as'=>'gestacoes.edit', 'uses'=>"\App\Http\Controllers\GestacaoController@edit"]);
        Route::put('{id}/update', ['as'=>'gestacoes.update', 'uses'=>"\App\Http\Controllers\GestacaoController@update"]);
    });
    
});
