<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaController;
use App\Models\Area;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index']);
Route::get('/periksa', [AppController::class, 'periksa']);
Route::get('/periksa/{id}', [AreaController::class, 'show']);
Route::get('/kesimpulan', [AppController::class, 'kesimpulan']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::delete('/dashboard/kerusakan/{id}', [GejalaController::class, 'destroyGA']);
    // gejala
    Route::get('/dashboard/gejala', [GejalaController::class, 'index']);
    Route::post('/dashboard/gejala', [GejalaController::class, 'store']);
    Route::get('/dashboard/gejala/{id}', [GejalaController::class, 'show']);
    Route::get('/dashboard/gejala/{id}/edit', [GejalaController::class, 'edit']);
    Route::put('/dashboard/gejala/{id}', [GejalaController::class, 'update']);
    Route::delete('/dashboard/gejala/{id}', [GejalaController::class, 'destroy']);
    // area
    Route::get('/dashboard/area', [AreaController::class, 'index']);
    Route::get('/dashboard/area/create', [AreaController::class, 'create']);
    Route::post('/dashboard/area/create', [AreaController::class, 'store']);
    Route::get('/dashboard/area/{id}/edit', [AreaController::class, 'edit']);
    Route::put('/dashboard/area/{id}', [AreaController::class, 'update']);
    Route::delete('/dashboard/area/{id}', [AreaController::class, 'destroy']);
});
