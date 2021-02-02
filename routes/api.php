<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectAssignmentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('projects', [ProjectController::class, 'index']);
Route::get('projects/{id}', [ProjectController::class, 'show']);
Route::post('projects/create', [ProjectController::class, 'store']);
Route::put('projects/update/{id}', [ProjectController::class, 'update']);
Route::delete('projects/delete/{id}', [ProjectController::class, 'delete']);


// Route::get('projects', [ProjectController::class, 'index']);
// Route::get('projects/{id}', [ProjectController::class, 'show']);
// Route::post('projects/create', [ProjectController::class, 'store']);
// Route::put('projects/update/{id}', [ProjectController::class, 'update']);
// Route::delete('projects/delete/{id}', [ProjectController::class, 'delete']);

Route::get('projects_assignment', [ProjectAssignmentController::class, 'getAllAssigned']);
Route::post('projects_assignment/create', [ProjectAssignmentController::class, 'assignProject']);