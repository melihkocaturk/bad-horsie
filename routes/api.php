<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClubController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\HorseController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\LessonRightController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\StudentLessonController;
use App\Http\Controllers\Api\TrainerLessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/horses', HorseController::class);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
    Route::apiResource('/clubs', ClubController::class);
    Route::apiResource('/events', EventController::class);
    Route::apiResource('/members', MemberController::class)
        ->only(['store', 'destroy']);
    Route::apiResource('/schedule', ScheduleController::class)
        ->only(['index']);
    Route::apiResource('/lessons', LessonController::class);
    Route::apiResource('/lesson-rights', LessonRightController::class)
        ->only(['index', 'store']);
    Route::apiResource('/student/lessons', StudentLessonController::class)
        ->only(['index', 'show', 'update']);
    Route::apiResource('/trainer/lessons', TrainerLessonController::class)
        ->only(['index', 'show', 'update']);
});
