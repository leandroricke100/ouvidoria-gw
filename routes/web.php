<?php

use App\Http\Controllers\IndexArquivo;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [IndexController::class, 'home']);
Route::get('/arquivo/{id}/{op?}', [IndexArquivo::class, 'index'])->name('pg-arquivo');



// OUVIDORIA

// CONSULTAR ATENDIMENTO
Route::get('/ouvidoria/atendimento/{id}', [IndexController::class, 'atendimento']);

// CONSULTAR LISTA DE ATENDIMENTOS
Route::get('/ouvidoria/atendimentos', [IndexController::class, 'atendimentos']);

// CADASTRAR NOVA SOLICITAÇÃO
Route::get('/ouvidoria', function () {
    return view('ouvidoria');
});
