<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Estoque;
use App\Colaborador;
use App\Saida;

class SaidaController extends Controller
{
    public function listarSaida()
    {
        return response()->json(Saida::all());
    }
    public function saidaEstoque(Request $request)
    {
        $saida =  new Saida();
        $saida->Estoque_idEstoque = $request->saidaEstoque;
        $saida->Colaborador_idColaborador = $request->saidaColaborador;
        $saida->save();
        return response()->json(' Com Sucesso!!');
    }
    public function deletarSaida($id)
    {
        $saida = Saida::find($id);
        $del = $saida->delete();
        return response()->json('Saida Deletada Com Sucesso!!');
    }
    public function atualizarSaida(Request $request,$id)
    {
        $saida = $request->all();
        Saida::find($id)->update($saida);
        return response()->json('Saida Atualizado Com Sucesso!!');

    }
}
