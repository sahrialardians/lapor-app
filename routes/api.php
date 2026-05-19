<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    AuthController,
    ReportController
};

use App\Http\Controllers\Api\Admin\{
    AdminAuthController,
    AdminReportController
};

// ----------------------------------------Endpoint untuk users -----------------------------------------------
// Endpoint untuk register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Endpoint dengan middleware yang sudah login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
    Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    // Endpoint untuk report
    Route::apiResource('reports', ReportController::class);
});

// ----------------------------------------Endpoint untuk admin -----------------------------------------------
// Endpoint untuk register dan login
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// Endpoint dengan middleware yang sudah login
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/profile', [AdminAuthController::class, 'profile'])->middleware('auth:sanctum');
    Route::delete('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:sanctum');

    // Endpoint untuk report
    Route::get('/admin/reports', [AdminReportController::class, 'index']);
    Route::get('/admin/reports/{id}', [AdminReportController::class, 'show']);
    Route::post('/admin/reports/{id}', [AdminReportController::class, 'update']);
});