<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\CorrelationController;
use App\Http\Controllers\CorrelationListController;

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

Route::get('/heroes',[HeroController::class, 'index']);
Route::get('/heroes/{id}',[HeroController::class, 'show']);
Route::post('/heroes',[HeroController::class, 'create']);
Route::put('/heroes',[HeroController::class, 'update']);
Route::delete('/heroes/{id}',[HeroController::class, 'delete']);

Route::get('/correlations',[CorrelationController::class, 'index']);

Route::get('/correlationlists/{id}',[CorrelationListController::class, 'index']);
Route::post('/correlationlists',[CorrelationListController::class, 'create']);