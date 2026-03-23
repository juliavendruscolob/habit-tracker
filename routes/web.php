<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

//site
Route::get('/', [SiteController::class, 'index'])->name('site.index');

//login
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authentication'])->name('auth.login');

//garante que apenas usuários autenticados (logados) possam acessar esta rota
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('site.dashboard');

    Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
});