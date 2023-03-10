<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use GuzzleHttp\Client;


    Route :: get ( '/', [ LoginController ::class, 'index' ])-> name ( 'login' );
    Route::post('/', [LoginController::class, 'login_action'])->name('login_action');

// Route::middleware(['auth'])->group(function () {
    Route::get('/painel', [DashController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [DashController::class, 'logout'])->name('logout');

    Route::get('/usuarios', [DashController::class, 'usuarios'])->name('usuarios');

    //Consultas
    Route::get('/consultaSimples', [ConsultasController::class, 'consultaSimples'])->name('consultaSimples');
    Route::get('/consultaApi', [ConsultasController::class, 'consultaCompletaApi'])->name('consultaApi');
    Route::get('/consultaCompleta', [ConsultasController::class, 'consultaCompleta'])->name('consultaCompleta');
// });
