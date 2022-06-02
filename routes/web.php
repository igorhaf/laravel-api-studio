<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);
Route::get('/prot', [\App\Http\Controllers\MainController::class, 'index']);
Route::any('/filetree', [\App\Http\Controllers\MainController::class, 'filetree']);
Route::get('/livewire', \App\Http\Livewire\Counter::class);
Route::post('/file', [\App\Http\Controllers\MainController::class, 'getFile']);
