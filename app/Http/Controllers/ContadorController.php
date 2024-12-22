<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contador;

class ContadorController extends Controller
{
    //
    public function contarDeAte(Request $request){
        $numeroDe = $request->numeroDe;
        $numeroAte = $request->numeroAte;
        $numerosContados = '';

        for($x = $numeroDe; $x <= $numeroAte; $x++){
            $numerosContados = $numerosContados . $x . ',';
        };

        static::guardarNoBanco($request);
        return response($numerosContados, 200);

    }

    private static function guardarNoBanco($request){
        //salvando no bd
        $contadora = new Contador();
        $contadora->numero_de = $request->numeroDe;
        $contadora->numero_ate = $request->numeroAte;
        $contadora->numeros_contados = $request->numerosContados;
        $contadora->created_by = 1;

        $contadora->save();

        return $contadora;
    }
}
