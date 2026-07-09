<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ChoiceController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\AuthController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->withoutMiddleware('auth:sanctum');
    Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::apiResource('specialties', SpecialtyController::class);
    Route::apiResource('questions', QuestionController::class);
    Route::apiResource('choices', ChoiceController::class);
    Route::apiResource('students-detail', StudentController::class)->only(['index', 'show']);
});
