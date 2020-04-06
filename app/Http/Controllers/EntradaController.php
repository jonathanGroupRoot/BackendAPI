<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Entrada;
use App\Colaborador;
use App\Estoque;

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

        $up = $valorFinal->update($dadoEstoque);
        $entrada->save();
        return response()->json('Entrada Com Sucesso!!');
    }
    // public function deletarEntrada($id)
    // {
    //     $entrada = Entrada::find($id);
    //     $del = $entrada->delete();
    //     return response()->json('Entrada Deletado Com Sucesso!!');
    // }
    // public function atualizarEntrada(Request $request,$id)
    // {
    //     $entrada = $request->all();
    //     Entrada::find($id)->update($entrada);
    //     return response()->json('Entrada Atualizado Com Sucesso!!');

    // }
    
}
