<?php

use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [FilmController::class, 'index']);


Route::apiResource('users', UsersController::class);