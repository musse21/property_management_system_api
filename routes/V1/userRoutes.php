<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthsController;
Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthsController::class, 'register']);
});
