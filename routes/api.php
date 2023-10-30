<?php

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


Route::post('card/create', [\App\Http\Controllers\API\CardIssueApiController::class, 'store']);

Route::post('card/recharge', [\App\Http\Controllers\API\CardIssueApiController::class, 'recharge']);

Route::get('card', [\App\Http\Controllers\API\CardIssueApiController::class, 'index']);

Route::get('card-by-societe/{societe_id}', [\App\Http\Controllers\API\CardIssueApiController::class, 'cardbysociete']);

Route::get('records', [\App\Http\Controllers\API\RecordController::class, 'index']);

Route::get('records/{id}', [\App\Http\Controllers\API\RecordController::class, 'show']);

Route::get('records-day', [\App\Http\Controllers\API\RecordController::class, 'day']);

Route::get('records-week', [\App\Http\Controllers\API\RecordController::class, 'week']);

Route::post('records', [\App\Http\Controllers\API\RecordController::class, 'update']);

Route::post('records-delete', [\App\Http\Controllers\API\RecordController::class, 'destroy']);

