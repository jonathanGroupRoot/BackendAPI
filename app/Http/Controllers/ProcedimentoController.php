<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Procedimento;

class ProcedimentoController extends Controller
{
    public function listarProcedimento()
    {
        return response()->json(Procedimento::all());
    }
    public function cadastrarProcedimento(Request $request)
    {
        $procedimento = new Procedimento();
        $procedimento->tipo = $request->tipo;
        $procedimento->valor = $request->valor;
        $procedimento->descricao = $request->descricao;
        $procedimento->save();
        return response()->json('Procedimento Cadastrado Com Sucesso');

    }
    public function deletarProcedimento(Request $request,$id)
    {
        $registros = Procedimento::find($id);
        $del = $registros->delete();
        return response()->json('Procedimento Deletado Com Sucesso!!');
    }
    public function atualizarProcedimento(Request $request,$id)
    {
        $registros = $request->all();
        Procedimento::find($id)->update($registros);
        return response()->json('Atualizado Com Sucesso!!');
        
    }

}
