<?php

use App\Http\Controllers\OuvidoriaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/Ouvidoria', [OuvidoriaController::class, 'cadastro']);
Route::post('/OuvidoriaMensagemAdmin', [OuvidoriaController::class, 'mensagemAdmin']);
Route::post('/OuvidoriaMensagemUser', [OuvidoriaController::class, 'mensagemUsuario']);
Route::post('/OuvidoriaDeleteMensagem', [OuvidoriaController::class, 'deleteMsg']);
Route::post('/OuvidoriaInputAdmin', [OuvidoriaController::class, 'inputAdmin']);
Route::post('/OuvidoriaAtendimento', [OuvidoriaController::class, 'atendimento']);
