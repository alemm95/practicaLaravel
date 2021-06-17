<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::resource('/activity', ActivityController::class)->middleware(['auth']);

Route::get('/configuration', [UserController::class, 'config'])->middleware(['auth'])->name('config');
Route::post('/user/update', [UserController::class, 'updateUser'])->middleware(['auth'])->name('user.updateUser');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

