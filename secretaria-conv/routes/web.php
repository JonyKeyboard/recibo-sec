<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FiliadoController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('filiados', [FiliadoController::class, 'index']);
Route::get('filiados/cadastrar', [FiliadoController::class, 'create']);


