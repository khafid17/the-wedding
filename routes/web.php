<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UndanganController;

use Illuminate\Support\Facades\Auth;
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

Route::resource('undangan', UndanganController::class);
Route::get('/undangan/status/{id}', [UndanganController::class, 'status']);
Route::get('/undangan/data/tamu', [UndanganController::class, 'hadir'])->name('hadir');
Route::get('undangan/export/undangan', [UndanganController::class, 'exportundangan'])->name('exportundangan');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
