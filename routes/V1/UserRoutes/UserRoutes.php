<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UsersController;


Route::group(['prefix' => 'auth'], function () {
    Route::post('user/register', [UsersController::class, 'store']);
});
