<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliadoController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('filiados', [FiliadoController::class, 'index'])->name('listar_filiados');
Route::get('filiados/cadastrar', [FiliadoController::class, 'create'])->name('form_criar_filiado');
Route::post('filiados/cadastrar', [FiliadoController::class, 'store']);
Route::delete('filiados/{id}', [FiliadoController::class, 'destroy']);


