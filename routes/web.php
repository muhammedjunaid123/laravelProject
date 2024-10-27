<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureAuth;
use App\Http\Middleware\Ensurelogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/register');
});

Route::get(('/register'), [AuthController::class, 'create'])->middleware(Ensurelogin::class);
Route::post(('/register'), [UserController::class, 'store'])->middleware(Ensurelogin::class);
Route::get(('/login'), [AuthController::class, 'loadLogin'])->middleware(Ensurelogin::class);
Route::post(('/login'), [AuthController::class, 'authUser'])->middleware(Ensurelogin::class);
Route::get(('/logout'), [AuthController::class, 'logout'])->middleware(EnsureAuth::class);
Route::get(('/home'), [UserController::class, 'show'])->middleware(EnsureAuth::class);
Route::patch(('/update'), [UserController::class, 'update'])->middleware(EnsureAuth::class);
Route::get(('/list'), [UserController::class, 'index'])->middleware(EnsureAuth::class);
Route::get(('/mark/{id}'), [MarkController::class, 'create'])->middleware(EnsureAuth::class);
Route::post(('/mark'), [MarkController::class, 'store'])->middleware(EnsureAuth::class);
Route::patch(('/mark'), [MarkController::class, 'update'])->middleware(EnsureAuth::class);
