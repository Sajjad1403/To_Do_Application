<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Todo\ToDoController;

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

// Registration
Route::post('register', [RegisterController::class, 'register']);

// Verification
Route::post('verify', [VerificationController::class, 'verify']);

// Login
Route::post('login', [LoginController::class, 'login']);

Route::group(['middleware' => 'jwtVerify'], function () {
    // Logout
    Route::post('logout', [LogoutController::class, 'logout']);

    Route::get('/todos', [ToDoController::class, 'index']);
    Route::post('/todos', [ToDoController::class, 'store']);
    Route::get('/todos/{id}', [ToDoController::class, 'show']);
    Route::put('/todos/{id}', [ToDoController::class, 'update']);
    Route::delete('/todos/{id}', [ToDoController::class, 'destroy']);

});
