<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/home', [\App\Http\Controllers\SiteController::class, 'index']);

//login
Route::get('/login', [LoginController::class, 'index']);