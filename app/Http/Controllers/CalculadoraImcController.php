<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CalculadoraImcController extends Controller
{
    //
    public function calculadoraImc(Request $request){
        $mensagem = 'Com IMC de: ';

        $peso=$request->peso;
        $altura=$request->altura;
        $imc= number_format($peso / ($altura * $altura), 2);

        if($imc < 18.5){
            return response($mensagem . $imc . ' Atenção! Seu indice é de: Magreza', 200);
        }elseif($imc > 18.51 && $imc <= 24.99){
            return response($mensagem . $imc . ' Parabéns! Seu indice é de: Normal', 200);
        }elseif($imc > 25 && $imc <= 29.99){
            return response($mensagem . $imc . ' Ops! Seu indice é de: Sobrepeso', 200);
        }elseif($imc > 30 && $imc <= 34.99){
            return response($mensagem . $imc . ' Atenção! Seu indice é de: Obsidade Grau I', 200);
        }elseif($imc > 35 && $imc <= 39.99){
            return response($mensagem . $imc . ' Atenção! Seu indice é de: Obsidade Grau II', 200);
        }elseif($imc > 40){
            return response($mensagem . $imc . ' Atenção! Seu indice é de: Obsidade Grau III', 200);
        }else{
            return response( 'Não foi possível calcular', 200);
        }

    }
}
