<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculadora;

class CalculadoraController extends Controller
{
    public function calcular(Request $request)
    {
        $valorUm = $request->valorUm;
        $valorDois = $request->valorDois;
        $operacao = $request->operacao;

        if ($operacao == '+') {
            $resultado = $valorUm + $valorDois;

            // salvando no bd
            static::guardarNoBanco($request, $resultado, null);

            return response($resultado, 200);
        } elseif ($operacao == '-') {
            $resultado = $valorUm - $valorDois;

            // salvando no bd
            static::guardarNoBanco($request, $resultado, null);

            return response($resultado, 200);
        } elseif ($operacao == '*') {
            $resultado = $valorUm * $valorDois;

            // salvando no bd
            static::guardarNoBanco($request, $resultado, null);

            return response($resultado, 200);
        } elseif ($operacao == '/') {
            if ($valorDois == 0) {

                $erro = "Não é possível dividir um número por Zero!";
                // salvando no bd
                static::guardarNoBanco($request, null, $erro);

                return response($erro, 422); // 422 - está tentando um dado improcessável
            }
            $resultado = $valorUm / $valorDois;

            // salvando no bd
            static::guardarNoBanco($request, $resultado, null);

            return response($resultado, 200);
        } else {
            $erro = "Operador invalido";
            return response($erro, 422);
        }
    }

    private static function guardarNoBanco($request, $resultado, $erro)
    {
        // salvando no bd
        $calculadora = new Calculadora();
        $calculadora->valorUm = $request->valorUm;
        $calculadora->valorDois = $request->valorDois;
        $calculadora->operacao = $request->operacao;
        $calculadora->resultado = $resultado;
        $calculadora->erro = $erro;
        $calculadora->created_by = 1;

        $calculadora->save();

        return $calculadora;
    }
}
