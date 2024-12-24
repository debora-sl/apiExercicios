<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    // função que salva no bd
    public function salvar(Request $request)
    {
        $agenda = new Agenda();
        $agenda->nome = $request->nome;
        $agenda->email = $request->email;
        $agenda->telefoneCelular = $request->telefoneCelular;
        $agenda->telefoneFixo = $request->telefoneFixo;
        $agenda->endereco = $request->endereco;
        $agenda->telefoneFixo = 1;
        $agenda->save();

        return response($agenda, 201);
    }
}
