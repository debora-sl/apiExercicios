<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\CalculadoraImcController;



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

Route::post('/calculadora/calcular', [CalculadoraController::class,'calcular']);

Route::post('/contador/contarDeAte', [ContadorController::class,'contarDeAte']);

Route::post('/calculadoraimc/calculadoraimc', [CalculadoraImcController::class,'calculadoraImc']);
