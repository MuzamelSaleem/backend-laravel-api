<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\UserPreferencesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->get('user', [UserController::class, 'user']);
Route::middleware('auth:sanctum')->post('logout', [UserController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/news', [NewsController::class, 'getNews']);
Route::middleware('auth:sanctum')->get('/preferences', [UserPreferencesController::class, 'preferences']);
Route::middleware('auth:sanctum')->post('/update-preferences', [UserPreferencesController::class, 'updatePreferences']);

