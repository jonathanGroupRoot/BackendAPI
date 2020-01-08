<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Estoque;
use App\Fornecedor;
use App\Material;

class EstoqueController extends Controller
{
    public function listarEstoque()
    {
        return response()->json(Estoque::all());
    }
    public function cadastrarEstoque(Request $request)
    {
        $estoque = new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->data = $request->data;
        $estoque->Material_idMaterial = $request->materialID;
        $estoque->save();
        return response()->json('Estoque Cadastrado Com Sucesso!!');
    }
    public function deletarEstoque($id)
    {
        $estoque = Estoque::find($id);
        $del = $estoque->delete();
        return response()->json('Estoque Deletado Com Sucesso!!');
    }
    public function atualizarEstoque(Request $request,$id)
    {
        $estoque = $request->all();
        Estoque::find($id)->update($estoque);
        return response()->json('Estoque Atualizado Com Sucesso!!');
    }
   
}
