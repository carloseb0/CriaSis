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
Route::get('/animais', [\App\Http\Controllers\AnimalController::class, 'index']);
Route::get('/animais/create', [\App\Http\Controllers\AnimalController::class, 'create'])->name('animais.create');
Route::post('/animais/store', [\App\Http\Controllers\AnimalController::class, 'store']);

Route::get('/racas', [\App\Http\Controllers\RacaController::class, 'index'])->name('racas.index');
Route::get('/racas/create', [\App\Http\Controllers\RacaController::class, 'create'])->name('racas.create');
Route::post('/racas/store', [\App\Http\Controllers\RacaController::class, 'store']);

Route::get('/vacinas', [\App\Http\Controllers\VacinaController::class, 'index'])->name('vacinas.index');
Route::get('/vacinas/create', [\App\Http\Controllers\VacinaController::class, 'create'])->name('vacinas.create');
Route::post('/vacinas/store', [\App\Http\Controllers\VacinaController::class, 'store']);