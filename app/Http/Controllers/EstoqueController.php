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
        $fornecedor = new Fornecedor();
        $fornecedor->nome = $request->nomeFornecedor;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->telefone = $request->telefone;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->save();

        $material = new Material();
        $material->nome = $request->nome;
        $material->codigo = $request->codigo;
        $material->preco = $request->preco;
        $material->Fornecedor_idFornecedor = $fornecedor->id;
        $material->save();
        
        $estoque = new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->data = $request->data;
        $estoque->Material_idMaterial = $material->id;
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
