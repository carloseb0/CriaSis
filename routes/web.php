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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/animais', [\App\Http\Controllers\AnimalController::class, 'index'])->name('animais.index');
Route::get('/animais/create', [\App\Http\Controllers\AnimalController::class, 'create'])->name('animais.create');
Route::post('/animais/store', [\App\Http\Controllers\AnimalController::class, 'store']);

Route::get('/racas', [\App\Http\Controllers\RacaController::class, 'index'])->name('racas.index');
Route::get('/racas/create', [\App\Http\Controllers\RacaController::class, 'create'])->name('racas.create');
Route::post('/racas/store', [\App\Http\Controllers\RacaController::class, 'store']);

Route::get('/vacinas', [\App\Http\Controllers\VacinaController::class, 'index'])->name('vacinas.index');
Route::get('/vacinas/create', [\App\Http\Controllers\VacinaController::class, 'create'])->name('vacinas.create');
Route::post('/vacinas/store', [\App\Http\Controllers\VacinaController::class, 'store']);

Route::get('/dietas', [\App\Http\Controllers\DietaController::class, 'index'])->name('dietas.index');
Route::get('/dietas/create', [\App\Http\Controllers\DietaController::class, 'create'])->name('dietas.create');
Route::post('/dietas/store', [\App\Http\Controllers\DietaController::class, 'store']);

Route::get('/pastagens', [\App\Http\Controllers\PanstagemController::class, 'index'])->name('pastagens.index');
Route::get('/pastagens/create', [\App\Http\Controllers\PanstagemController::class, 'create'])->name('pastagens.create');
Route::post('/pastagens/store', [\App\Http\Controllers\PanstagemController::class, 'store']);