<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectorController;

Route::apiResource('lectores', LectorController::class);
Route::get('/prueba', fn () => ['ok' => true]);
