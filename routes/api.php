<?php

use App\Http\Controllers\VesselController;
use App\Http\Controllers\VoyageController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/voyages', VoyageController::class)->only('index', 'store', 'update');

Route::post('/vessels/{id}/vessel-opex',[ VesselController::class, 'vessel_opex'])->name('vessel.opex');

Route::get('/vessels/{id}/financial-report', [VesselController::class, 'financial_report'])->name('vessel.fin_report');
