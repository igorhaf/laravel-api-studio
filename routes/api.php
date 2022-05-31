<?php

use App\Http\Controllers\Api\PostController;
use App\Modules\Authentication\http\Api\V1\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');
Route::post('/auth/register', [IndexControlle::class, 'createUser']);
Route::post('/auth/login', [IndexController::class, 'loginUser']);

Route::prefix('authentication/authentication')->group(function () {
    Route::post('/', [App\Modules\Authentication\Http\Controllers\Api\v1\AuthenticationController::class, 'store']);
    Route::put('/{id}', [App\Modules\Authentication\Http\Controllers\Api\v1\AuthenticationController::class, 'update']);
    Route::get('/{id}', [App\Modules\Authentication\Http\Controllers\Api\v1\AuthenticationController::class, 'show']);
    Route::get('/', [App\Modules\Authentication\Http\Controllers\Api\v1\AuthenticationController::class, 'index']);
    Route::delete('/{id}', [App\Modules\Authentication\Http\Controllers\Api\v1\AuthenticationController::class, 'destroy']);
});*/
