<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratoController;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/', [ContratoController::class, 'index'])->name('contratos.index');

Route::get('contratos/{contrato}',[ContratoController::class,'show'])->name('contratos.show');

Route::get('category/{category}',[ContratoController::class,'category'])->name('contratos.category');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');
});
