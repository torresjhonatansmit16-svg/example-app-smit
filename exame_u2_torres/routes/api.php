<?php

use App\Http\Controllers\Api\CarreraController;
use App\Http\Controllers\Api\EstudianteController;
use Illuminate\Support\Facades\Route;

Route::apiResource('carreras', CarreraController::class);
Route::get('carreras/{id}/estudiantes', [CarreraController::class, 'estudiantes']);

Route::apiResource('estudiantes', EstudianteController::class);
