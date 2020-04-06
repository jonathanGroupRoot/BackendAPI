<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Estoque;
use App\Colaborador;
use App\Saida;
use DB;

class SaidaController extends Controller
{
    public function listarSaida()
    {
        $saida = DB::table('estoques')
        ->join('saidas','saidas.Estoque_idEstoque', '=','estoques.id')
        ->select('saidas.id','saidas.Estoque_idEstoque','saidas.Colaborador_idColaborador',
        'estoques.id','estoques.quantidade','estoques.data','estoques.Material_idMaterial')
        ->get();
        return response()->json($saida);
    }
    public function saidaEstoque(Request $request)
    {
        $messages = [
            'Estoque_idEstoque.required' => 'Estoque é um campo obrigatório',
            'Estoque_idEstoque.integer' => 'Estoque não encontrado',
            'Colaborador_idColaborador.required' => 'Nome do colaborador é um campo obrigatório',
            'Colaborador_idColaborador.integer' => 'Colaborador não cadastrado no sistema',
            'quantidade.required' => "Quantidade é um campo obrigatório",
        ];
        $this->validate($request, [
            'Estoque_idEstoque' => 'required|integer',
            'Colaborador_idColaborador' => 'required|integer',
            'quantidade' => 'required|integer',
        ],$messages);
        $saida =  new Saida();
        $saida->Estoque_idEstoque = $request->Estoque_idEstoque;
        $saida->Colaborador_idColaborador = $request->Colaborador_idColaborador;
        $saida->quantidade = $request->quantidade;

        $dadoEstoque = Estoque::find($request->Estoque_idEstoque);
    
        $valorFinal = $entrada->quantidade - $dadoEstoque->quantidade;

        DB::table('estoques')
        ->where('id', $request->Estoque_idEstoque)
        ->update(['quantidade' => $valorFinal]);
        $saida->save();
        return response()->json('Saida com Sucesso!!');
    }
    // public function deletarSaida($id)
    // {
    //     $saida = Saida::find($id);
    //     $del = $saida->delete();
    //     return response()->json('Saida Deletada Com Sucesso!!');
    // }
    // public function atualizarSaida(Request $request,$id)
    // {
    //     $saida = $request->all();
    //     Saida::find($id)->update($saida);
    //     return response()->json('Saida Atualizado Com Sucesso!!');

    // }
}
