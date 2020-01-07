<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function listarFornecedores()
    {
        return response()->json(Fornecedor::all());
    }
    public function cadastrarFornecedores(Request $request)
    {
        $fornecedor  = new Fornecedor();
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->telefone = $request->telefone;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->save();
        return response()->json('Fornecedor Cadastrado Com Sucesso!!');
    }
    public function atualizarFornecedores(Request $request,$id)
    {
        $fornecedor = $request->all();
        Fornecedor::find($id)->update($fornecedor);
        return response()->json('Fornecedor Atualizado Com Sucesso!!');
    }
    public function deletarFornecedores($id)
    {
        $fornecedor = Fornecedor::find($id);
        $del = $fornecedor->delete();
        return response()->json('Fornecedor Deletado Com Sucesso!!');
    }
    
}
