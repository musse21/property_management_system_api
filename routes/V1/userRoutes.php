<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthsController;
Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthsController::class, 'register']);
    Route::post('/login', [AuthsController::class, 'login']);
    Route::post('/authenticate', [AuthsController::class, 'authenticateUser']);
});
