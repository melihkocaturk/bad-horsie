<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MyHorseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentLessonController;
use App\Http\Controllers\TrainerLessonController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/my-horses', MyHorseController::class, ['names' => 'my-horses']);
    Route::resource('/clubs', ClubController::class, ['names' => 'clubs']);
    Route::resource('clubs.member', MemberController::class)
        ->only(['store', 'destroy']);
    Route::resource('clubs.lessons', LessonController::class);
    Route::resource('/student/lessons', StudentLessonController::class, ['names' => 'student-lessons'])
        ->only(['index', 'show', 'update']);
    Route::resource('/trainer/lessons', TrainerLessonController::class, ['names' => 'trainer-lessons'])
        ->only(['index', 'edit', 'update']);
});

require __DIR__.'/auth.php';

// Voyager
Route::group(['prefix' => 'sudo'], function () {
    Voyager::routes();
});

