<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\TramoController;
use App\Http\Controllers\TramoUserController;

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
    return view('welcome');
});

Route::resource('/user', UserController::class)->middleware(['auth']);
Route::resource('/actividad', ActividadController::class)->middleware(['auth']);

Route::get('/configuracion', [UserController::class, 'config'])->middleware(['auth'])->name('config');
Route::post('/configuracion', [UserController::class, 'updateAuth'])->middleware(['auth'])->name('updateAuth');

Route::resource('tramos', TramoController::class)->middleware(['auth'])->names('tramo');

Route::resource('mistramos', TramoUserController::class)->middleware(['auth'])->names('mistramos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

