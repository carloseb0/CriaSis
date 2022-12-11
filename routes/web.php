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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){


    Route::group(['prefix'=>'home', 'where'=>['id'=>'[0-9]+']], function() {
        Route::get('', ['as'=>'home', 'uses'=>"\App\Http\Controllers\HomeController@index"]);
    });

    Route::middleware('can:admin')->group(function () {
        Route::group(['prefix'=>'usuarios', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('', ['as'=>'usuarios', 'uses'=>"\App\Http\Controllers\UsuariosController@index"]);
            Route::get('create', ['as'=>'usuarios.create', 'uses'=>"\App\Http\Controllers\UsuariosController@create"]);
            Route::post('store', ['as'=>'usuarios.store', 'uses'=>"\App\Http\Controllers\UsuariosController@store"]);
            Route::get('{id}/destroy', ['as'=>'usuarios.destroy', 'uses'=>"\App\Http\Controllers\UsuariosController@destroy"]);
            Route::get('{id}/edit', ['as'=>'usuarios.edit', 'uses'=>"\App\Http\Controllers\UsuariosController@edit"]);
            Route::put('{id}/update', ['as'=>'usuarios.update', 'uses'=>"\App\Http\Controllers\UsuariosController@update"]);
        });

        Route::group(['prefix'=>'perfis', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('', ['as'=>'perfis', 'uses'=>"\App\Http\Controllers\PerfilController@index"]);
            Route::get('create', ['as'=>'perfis.create', 'uses'=>"\App\Http\Controllers\PerfilController@create"]);
            Route::post('store', ['as'=>'perfis.store', 'uses'=>"\App\Http\Controllers\PerfilController@store"]);
            Route::get('{id}/destroy', ['as'=>'perfis.destroy', 'uses'=>"\App\Http\Controllers\PerfilController@destroy"]);
            Route::get('{id}/edit', ['as'=>'perfis.edit', 'uses'=>"\App\Http\Controllers\PerfilController@edit"]);
            Route::put('{id}/update', ['as'=>'perfis.update', 'uses'=>"\App\Http\Controllers\PerfilController@update"]);
        });
    });


    Route::middleware('can:veterinario-admin')->group(function () {
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

        Route::group(['prefix'=>'racoes', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('', ['as'=>'racoes', 'uses'=>"\App\Http\Controllers\RacaoController@index"]);
            Route::get('create', ['as'=>'racoes.create', 'uses'=>"\App\Http\Controllers\RacaoController@create"]);
            Route::post('store', ['as'=>'racoes.store', 'uses'=>"\App\Http\Controllers\RacaoController@store"]);
            Route::get('{id}/destroy', ['as'=>'racoes.destroy', 'uses'=>"\App\Http\Controllers\RacaoController@destroy"]);
            Route::get('{id}/edit', ['as'=>'racoes.edit', 'uses'=>"\App\Http\Controllers\RacaoController@edit"]);
            Route::put('{id}/update', ['as'=>'racoes.update', 'uses'=>"\App\Http\Controllers\RacaoController@update"]);
        });

        Route::group(['prefix'=>'lotes', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('', ['as'=>'lotes', 'uses'=>"\App\Http\Controllers\LoteController@index"]);
            Route::get('create', ['as'=>'lotes.create', 'uses'=>"\App\Http\Controllers\LoteController@create"]);
            Route::post('store', ['as'=>'lotes.store', 'uses'=>"\App\Http\Controllers\LoteController@store"]);
            Route::get('{id}/destroy', ['as'=>'lotes.destroy', 'uses'=>"\App\Http\Controllers\LoteController@destroy"]);
            Route::get('{id}/edit', ['as'=>'lotes.edit', 'uses'=>"\App\Http\Controllers\LoteController@edit"]);
            Route::put('{id}/update', ['as'=>'lotes.update', 'uses'=>"\App\Http\Controllers\LoteController@update"]);
        });

        Route::group(['prefix'=>'gerenciamentos', 'where'=>['id'=>'[0-9]+']], function() {
            Route::get('', ['as'=>'gerenciamentos', 'uses'=>"\App\Http\Controllers\GerenciamentoController@index"]);
            Route::get('create', ['as'=>'gerenciamentos.create', 'uses'=>"\App\Http\Controllers\GerenciamentoController@create"]);
            Route::post('store', ['as'=>'gerenciamentos.store', 'uses'=>"\App\Http\Controllers\GerenciamentoController@store"]);
            Route::get('{id}/destroy', ['as'=>'gerenciamentos.destroy', 'uses'=>"\App\Http\Controllers\GerenciamentoController@destroy"]);
            Route::get('{id}/edit', ['as'=>'gerenciamentos.edit', 'uses'=>"\App\Http\Controllers\GerenciamentoController@edit"]);
            Route::put('{id}/update', ['as'=>'gerenciamentos.update', 'uses'=>"\App\Http\Controllers\GerenciamentoController@update"]);
            Route::get('{id}/finalizar', ['as'=>'gerenciamentos.finalizar', 'uses'=>"\App\Http\Controllers\GerenciamentoController@finalizar"]);
        });

        Route::group(['prefix'=>'relvacinas', 'where'=>['id'=>'[0-9]+']], function() {
            Route::any('', ['as'=>'relvacinas', 'uses'=>"\App\Http\Controllers\RelVacinaController@index"]);
            Route::get('exportacao', ['as'=>'relvacinas.exportacao', 'uses'=>"\App\Http\Controllers\RelVacinaController@exportacao"]);
        });

        Route::group(['prefix'=>'relpastagens', 'where'=>['id'=>'[0-9]+']], function() {
            Route::any('', ['as'=>'relpastagens', 'uses'=>"\App\Http\Controllers\RelPastagemController@index"]);
            Route::get('exportacao', ['as'=>'relpastagens.exportacao', 'uses'=>"\App\Http\Controllers\RelPastagemController@exportacao"]);
        });

        Route::group(['prefix'=>'relgestacoes', 'where'=>['id'=>'[0-9]+']], function() {
            Route::any('', ['as'=>'relgestacoes', 'uses'=>"\App\Http\Controllers\RelGestacaoController@index"]);
            Route::get('exportacao', ['as'=>'relgestacoes.exportacao', 'uses'=>"\App\Http\Controllers\RelGestacaoController@exportacao"]);
        });

        Route::group(['prefix'=>'relanimais', 'where'=>['id'=>'[0-9]+']], function() {
            Route::any('', ['as'=>'relanimais', 'uses'=>"\App\Http\Controllers\RelAnimaisController@index"]);
            Route::get('exportacao', ['as'=>'relanimais.exportacao', 'uses'=>"\App\Http\Controllers\RelAnimaisController@exportacao"]);
        });
    });

});
