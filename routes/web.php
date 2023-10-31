<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UbicacionControlle;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::resource('/usuario', UsuarioController::class);
    Route::resource('/ubicacion', UbicacionControlle::class);
    Route::resource('/departamento', DepartamentoController::class);
    Route::resource('/cargo', CargoController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); 
});
