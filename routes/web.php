<?php

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

Route::get('/materia/{id}', function ($id) {
    return view('materia', ['id' => $id]);
});

Route::get('/ouvidoria', function () {
    return view('ouvidoria');
});




// Criar rota "/ouvidoria" apontando pra um "view" (.blade.php)