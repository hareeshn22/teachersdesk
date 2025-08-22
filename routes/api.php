<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ExampleController;
use App\Http\Controllers\Api\VideoController;
use App\Http\Controllers\Api\NoteController;

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

// Principal Routes
Route::prefix('1')->group(function () {

    // Route::post('/principal/login', [LoginController::class, 'login']);
    // Route::post('/principal/logout', [LoginController::class, 'logout']);

    // Lessons
    Route::get('/lessons/{cid}/{sid}', [LessonController::class, 'index']);
    Route::get('/lessonsbys/{id}', [LessonController::class, 'villagebyd']);
    Route::get('/lesson/{id}', [LessonController::class, 'show']);

    // Topics
    Route::get('/topics/{id}', [TopicController::class, 'index']);
    Route::get('/topicbys/{id}', [TopicController::class, 'villagebyd']);
    Route::get('/subtopics/{id}', [TopicController::class, 'subtopics']);
    Route::get('/topic/{id}', [TopicController::class, 'show']);

    // Materials
    Route::get('/materials/{id}', [MaterialController::class, 'index']);
    Route::get('/materialbys/{id}', [MaterialController::class, 'villagebyd']);
    Route::get('/material/{id}', [MaterialController::class, 'show']);

    // Examples
    Route::get('/examples/{id}', [ExampleController::class, 'index']);
    Route::get('/examplesbys/{id}', [ExampleController::class, 'villagebyd']);
    Route::get('/example/{id}', [ExampleController::class, 'show']);

    // Videos
    Route::get('/videos/{id}', [VideoController::class, 'index']);
    Route::get('/videosbys/{id}', [VideoController::class, 'villagebyd']);
    Route::get('/video/{id}', [VideoController::class, 'show']);

    // Notes
    Route::get('/notes/{id}', [NoteController::class, 'index']);
    Route::get('/notesbys/{id}', [NoteController::class, 'villagebyd']);
    Route::get('/note/{id}', [NoteController::class, 'show']);



});
