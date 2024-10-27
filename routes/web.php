<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/register');
});

Route::get(('/register'), [AuthController::class, 'create']);
Route::post(('/register'), [UserController::class, 'store']);
Route::get(('/login'), [AuthController::class, 'loadLogin']);
Route::post(('/login'), [AuthController::class, 'authUser']);
Route::get(('/home'), [UserController::class, 'show']);
Route::patch(('/update'), [UserController::class, 'update']);
Route::get(('/list'), [UserController::class, 'index']);
Route::get(('/mark/{id}'), [MarkController::class, 'create']);
Route::post(('/mark'), [MarkController::class, 'store']);
Route::patch(('/mark'), [MarkController::class, 'update']);