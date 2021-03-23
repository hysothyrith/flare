<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\UserNoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('user/notes', [UserNoteController::class, 'index']);
    Route::get('user/courses', [UserCourseController::class, 'index']);
    Route::apiResources([
        'courses' => CourseController::class,
        'lessons' => LessonController::class,
        'notes' => NoteController::class
    ]);
});
