<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', [\App\Http\Controllers\SiteController::class, 'index']);
