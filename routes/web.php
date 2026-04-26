<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitController;

//site
Route::get('/', [SiteController::class, 'index'])->name('site.index');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('auth.login');
Route::get('/cadastro', [RegisterController::class, 'index'])->name('site.register');
Route::post('/cadastro', [RegisterController::class, 'store'])->name('auth.register');

//garante que apenas usuários autenticados (logados) possam acessar esta rota
Route::middleware('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

    Route::resource('/dashboard/habits', controller: HabitController::class)->except('show');
});