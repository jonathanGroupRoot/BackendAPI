<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
        $messages = [
            'quantidade.required' => 'Quantidade é um campo obrigatório',
            'quantidade.integer' => 'Quantidade equivale a somente valores inteiros',
            'data.required' => 'Data é um campo obrigatório',
            'data.date' => 'Data equivale somente a um campo tipo data',
        ];
        $this->validate($request,[
            'quantidade' => 'required|integer',
            'data' => 'required|date',
            'Material_idMaterial' => 'required|integer',
        ],$messages);
        $estoque = new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->data = $request->data;
        $estoque->Material_idMaterial = $request->Material_idMaterial;
        $estoque->save();
        return response()->json('Estoque Cadastrado Com Sucesso!!');
    }
    public function deletarEstoque($id)
    {
        $estoque = Estoque::find($id);
        $del = $estoque->delete();
        return response()->json('Estoque Deletado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Estoque::find($id);
        return response()->json($editar);
    }
    public function atualizarEstoque(Request $request,$id)
    {
        $estoque = $request->all();
        Estoque::find($id)->update($estoque);
        return response()->json('Estoque Atualizado Com Sucesso!!');
    }
   
}
