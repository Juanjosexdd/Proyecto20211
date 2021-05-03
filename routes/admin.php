<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TipodocumentoController;
use App\Http\Controllers\Admin\CargoController;
use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\EstadoController;
use App\Http\Controllers\Admin\CiudadController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('tipodocumentos', TipodocumentoController::class)->names('admin.tipodocumentos');
Route::resource('cargos', CargoController::class)->names('admin.cargos');
Route::resource('departamentos', DepartamentoController::class)->names('admin.departamentos');
Route::resource('estados', EstadoController::class)->names('admin.estados');
Route::resource('ciudads', CiudadController::class)->names('admin.ciudads');

