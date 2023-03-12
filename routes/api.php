<?php

use App\Http\Controllers\ApiConsultaController;
use App\Http\Controllers\ApiextractClientController;
use App\Http\Controllers\ApiUserController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->group(function () {
    Route::get('listUser', [ApiUserController::class,'index'])->name('listUser');
    Route::post('addUser', [ApiUserController::class, 'store'])->name('addUser');
    Route::get('users/{user}',[ApiUserController::class, 'show'])->name('show');
    Route::put('editUser/{user}', [ApiUserController::class, 'update'])->name('editUser');
    Route::delete('dellUser/{user}',[ApiUserController::class, 'destroy'])->name('dellUser');
// });
