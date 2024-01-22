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
Route::post('/OuvidoriaLogin', [OuvidoriaController::class, 'login']);
Route::post('/OuvidoriaRecuperarLogin', [OuvidoriaController::class, 'recuperarLogin']);
Route::post('/OuvidoriaRecuperarSenha', [OuvidoriaController::class, 'recuperarSenha']);
Route::post('/OuvidoriaProtocolo', [OuvidoriaController::class, 'protocolo']);
