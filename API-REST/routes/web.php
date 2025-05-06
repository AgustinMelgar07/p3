<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectorController;
use App\Http\Controllers\LectorWebController;
use App\Models\Lector;

Route::get('/lectores', [LectorWebController::class, 'index'])->name('lectores.index');
Route::post('/lectores', [LectorWebController::class, 'store'])->name('lectores.store');
Route::get('/lectores/{id}/edit', [LectorWebController::class, 'edit'])->name('lectores.edit');
Route::put('/lectores/{id}', [LectorWebController::class, 'update'])->name('lectores.update');
Route::delete('/lectores/{id}', [LectorWebController::class, 'destroy'])->name('lectores.destroy');
Route::get('/', function () {
    return view('welcome');
});
