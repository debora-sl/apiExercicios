<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PJ;

class PJController extends Controller
{
    // função que cria uma nova PJ e salva no BD
    public function salvar(Request $request)
    {
        $pj = new PJ();
        $pj->razaoSocial = $request->razaoSocial;
        $pj->cnpj = $request->cnpj;
        $pj->created_by = 1;

        $pj->save();

        return response($pj, 201);
    }

    // função que lista todos os dados do BD
    public function listar()
    {
        $pj = PJ::get();

        return response($pj, 200);
    }

    // função que lista um especifico no BD, atraves do id
    public function listarUm($id)
    {
        $code = 200;

        $pj = PJ::where('id', $id)->first();

        if ($pj == null) {
            $code = 404;
        }

        return response($pj, $code);
    }

    // função que atualiza no BD
    public function atualizarParcial($id, Request $request)
    {
        $pj = PJ::where('id', $id)->first();

        if (isset($request->razaoSocial)) {
            $pj->razaoSocial = $request->razaoSocial;
        }
        if (isset($request->cnpj)) {
            $pj->cnpj = $request->cnpj;
        }

        $pj->updated_by = 1;

        $pj->save();

        return response($pj, 200);
    }

    // função que deleta no BD
    public function deletar($id)
    {
        $code = 200;

        $pj = PJ::where('id', $id)->delete();

        if ($pj == 0) {
            $code = 404;
        }
        return response('', $code);
    }
};
