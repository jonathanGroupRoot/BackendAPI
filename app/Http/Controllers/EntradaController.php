<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Entrada;
use App\Colaborador;
use App\Estoque;
use App\Saida;
use DB;

class EntradaController extends Controller
{
    public function listarEntrada()
    {
        return response()->json(Entrada::all());
    }
    public function entradaEstoque(Request $request)
    {
        $messages = [
            'Estoque_idEstoque.required' => 'Estoque é um campo obrigatório',
            'Estoque_idEstoque.integer' => 'Estoque não cadastrado em nosso sistema',
            'Colaborador_idColaborador.required' => 'Colaborador é um campo obrigatório',
            'Colaborador_idColaborador.integer' => 'Colaborador não cadastrado em nosso sistema',
            'quantidade.required' => 'Quantidade é um campo obrogatório',
        ];
        $this->validate($request, [
            'Estoque_idEstoque' => 'required|integer',
            'Colaborador_idColaborador' => 'required|integer',
            'quantidade' => 'required|integer',
        ],$messages);
        $entrada =  new Entrada();
        $entrada->Estoque_idEstoque = $request->Estoque_idEstoque;
        $entrada->Colaborador_idColaborador = $request->Colaborador_idColaborador;
        $entrada->quantidade = $request->quantidade;

        $dadoEstoque = Estoque::find($request->Estoque_idEstoque);
    
        $valorFinal = $entrada->quantidade + $dadoEstoque->quantidade;

        DB::table('estoques')
        ->where('id', $request->Estoque_idEstoque)
        ->update(['quantidade' => $valorFinal]);
        $entrada->save();
        return response()->json('Entrada Com Sucesso!!');
    }
    public function pesquisarEntradaSaida($id)
    {


        $dados = DB::table('entradas')
        ->where('entradas.Estoque_idEstoque','=',$id)
        ->select('entradas.*')
        ->get();
        $dadosSaida = DB::table('saidas')
        ->where('saidas.Estoque_idEstoque','=',$id)
        ->select('saidas.*')
        ->get();
        return response()->json(['entrada'=>$dados,'saida'=>$dadosSaida]);
        
    }
    
}
