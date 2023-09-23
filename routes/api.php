<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Mood;
use App\Http\Controllers\MoodController;
use App\Http\Resources\MoodResource;

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

Route::get('/moods', function () {
    return MoodResource::collection(Mood::all());
});

Route::get('/mood/{id}', function ($id) {
    return new MoodResource(Mood::findOrFail($id));
});

Route::put('/mood/{id}', [MoodController::class, 'update']);

Route::delete('/mood/{id}', [MoodController::class, 'destroy']);

Route::post('/moods', [MoodController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
