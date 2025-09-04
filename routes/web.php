<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Recepcion\RecepcionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\MateriasController;






Route::get('/', function () {
    return view('landing.index');
})->name('landing')->middleware('guest');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('index.dashboardGeneral')->middleware(['auth', 'active']); // <- aquí agregas middleware






//////// Recepcion   ///////////
Route::prefix('Recepcion')->middleware(['auth','active', 'role:recepcion,admin'])->group(function(){

Route::get('/', [RecepcionController::class, 'index'])->name('recepcion');

});

//////// Notas   ///////////
Route::prefix('NotasAlumnos')->middleware(['auth','active', 'role:recepcion,admin'])->group(function(){

Route::get('/', [NotasController::class, 'index'])->name('recepcion.notas');

});

//////// Materias   ///////////
Route::prefix('Alumnos-Materias')->middleware(['auth','active', 'role:recepcion,admin'])->group(function(){

Route::get('/', [MateriasController::class, 'index'])->name('materias.index');

});
//////// administracion usuarios   ///////////
Route::prefix('administracion-usuarios')->middleware(['auth','active', 'role:admin'])->group(function(){
      Route::get('/', [UserController::class, 'index'])->name('usuarios.index');

});



Route::middleware(['auth','active', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::prefix('perfil')->middleware(['auth','active'])->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('perfil');
    Route::put('/', [PerfilController::class, 'update'])->name('perfil.update');
});








