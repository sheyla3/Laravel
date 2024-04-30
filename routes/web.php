<?php

use App\Http\Controllers\CasalsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('inicio'); })->name('/');
Route::post('/user-iniciar', [UsersController::class, 'LogIn'])->name('user.iniciar');
Route::get('/indexVista', [CasalsController::class, 'indexVista'])->name('indexVista');
Route::get('/formularioCasal', [CasalsController::class, 'formularioCasal'])->name('formularioCasal');
Route::post('/casal-nuevo', [CasalsController::class, 'nuevo'])->name('casal.nuevo');
Route::get('/editarcasal/{id}', [CasalsController::class, 'editarcasal'])->name('editarcasal');
Route::get('/eliminarcasal/{id}', [CasalsController::class, 'eliminarcasal'])->name('eliminarcasal');
Route::post('/casal-editar/{id}', [CasalsController::class, 'editar'])->name('casal.editar');
Route::post('/cerrar', [UsersController::class, 'CerrarSesion'])->name('cerrar');
