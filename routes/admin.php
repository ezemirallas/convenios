<?php

use App\Http\Controllers\Admin\AdendaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TipoController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\ContratoController;
use App\Http\Controllers\Admin\ProrrogaController;
use App\Http\Controllers\Admin\ProximosAVencerController;
use App\Http\Controllers\Admin\ResponsableController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class,'index'])->name('admin.home');

Route::resource('categories',CategoryController::class)->names('admin.categories');

Route::resource('tipos',TipoController::class)->names('admin.tipos');

Route::resource('areas',AreaController::class)->names('admin.areas');

Route::resource('personas', PersonaController::class)->names('admin.personas');

Route::resource('contratos', ContratoController::class)->names('admin.contratos');

Route::resource('adendas', AdendaController::class)->names('admin.adendas');

Route::resource('prorrogas', ProrrogaController::class)->names('admin.prorrogas');

Route::resource('responsables', ResponsableController::class)->names('admin.responsables');

Route::get('proximosavencer', [ProximosAVencerController::class,'index'])->name('admin.vencimientos.index');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');
