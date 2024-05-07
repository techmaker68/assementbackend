<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/note', [NotesController::class, 'index']);
    Route::post('/note', [NotesController::class, 'store']);
    Route::put('/note/{id}', [NotesController::class, 'update']);
    Route::delete('/note/{id}', [NotesController::class, 'destroy']);
});



// Route::apiResource('/note,NotesCOntroller');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
