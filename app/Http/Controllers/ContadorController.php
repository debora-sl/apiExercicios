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
        return response($numerosContados, 200);

    }
}
