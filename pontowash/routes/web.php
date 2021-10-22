<?php

use Illuminate\Support\Facades\Route;
//importando os controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TurnoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rotas dos controllers

Route::group(['middleware' => ['auth']], function(){

    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('relatorios', RelatorioController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('turno', TurnoController::class);
   
});
