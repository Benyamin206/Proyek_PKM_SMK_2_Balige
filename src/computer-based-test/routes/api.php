<?php

use App\Http\Controllers\API\CourseApiController;

use Illuminate\Support\Facades\Route;

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseApiController::class, 'index']);
    Route::post('/', [CourseApiController::class, 'store']);
    Route::get('{id}', [CourseApiController::class, 'show']);
    Route::put('{id}', [CourseApiController::class, 'update']);
    Route::delete('{id}', [CourseApiController::class, 'destroy']);
});
