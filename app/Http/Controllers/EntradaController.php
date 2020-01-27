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
        $entrada =  new Entrada();
        $entrada->Estoque_idEstoque = $request->entradaEstoque;
        $entrada->Colaborador_idColaborador = $request->entradaColaborador;
        $entrada->save();
        return response()->json('Entrada Com Sucesso!!');
    }
    public function deletarEntrada($id)
    {
        $entrada = Entrada::find($id);
        $del = $entrada->delete();
        return response()->json('Entrada Deletado Com Sucesso!!');
    }
    public function atualizarEntrada(Request $request,$id)
    {
        $entrada = $request->all();
        Entrada::find($id)->update($entrada);
        return response()->json('Entrada Atualizado Com Sucesso!!');

    }
}
