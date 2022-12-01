<?php

use App\Http\Controllers\ComicController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comics', [ComicController::class, 'index']);
Route::get('/comics/{id}', [ComicController::class, 'show']);
Route::put('/comics/{id}', [ComicController::class, 'update']);
Route::delete('/comics/{id}', [ComicController::class, 'destroy']);
Route::post('/comics', [ComicController::class, 'store']);
