<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    Route::group(["prefix" => "auth"], function() {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
    });

    // no need - this for protected by login
    // Route::middleware("auth:sanctum")->group(function() {
        Route::group(['prefix' => 'records'], function() {
            Route::get('', [RecordController::class, 'index']);
            Route::post('', [RecordController::class, 'store']);
            Route::get('{uuid}', [RecordController::class, 'show']);
            Route::put('{uuid}', [RecordController::class, 'update']);
            Route::delete('{uuid}', [RecordController::class, 'destroy']);
        });
    // });
});
