<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\MagasinController;
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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/list-trajet', [TrajetController::class, 'displayTrajets']);
    Route::post('/reserve-billet', [BilletController::class, 'reserveBillet']);
    Route::get('/billets-payer', [BilletController::class, 'billetsPayes']);
    Route::post('/payer-billet', [PaiementController::class, 'payerBillet']);
    Route::get('/magasin', [MagasinController::class, 'listerMagasinsParVille']);
});

Route::post('/villes', [VilleController::class, 'addVille']);
Route::post('/creer-trajets', [TrajetController::class, 'generateTrajets']);

