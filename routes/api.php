<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\CalculadoraImcController;

use App\Http\Controllers\AgendaController;


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

Route::post('/calculadora/calcular', [CalculadoraController::class, 'calcular']);

Route::post('/contador/contarDeAte', [ContadorController::class, 'contarDeAte']);

Route::post('/calculadoraimc/calculadoraimc', [CalculadoraImcController::class, 'calculadoraImc']);

Route::prefix('agenda')->group(function () {
    Route::post('/salvar', [AgendaController::class, 'salvar']);
    Route::get('/listar', [AgendaController::class, 'listar']);
    Route::get('/lerUm/{id}', [AgendaController::class, 'lerUm']);
    Route::delete('/deletar/{id}', [AgendaController::class, 'deletar']);
    Route::patch('/atualizarparcial/{id}', [AgendaController::class, 'atualizarParcial']);
});
