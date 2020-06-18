<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Fornecedor;
use DB;

class FornecedorController extends Controller
{
    public function listarFornecedores()
    {
        return response()->json(Fornecedor::all());
    }
    public function cadastrarFornecedores(Request $request)
    {
        $messages = [
            'nome.required' => 'Nome é um campo obrigatório',
            'nome.min' => 'Nome mínimo 5 caracteres',
            'nome.max' => 'Nome máximo 255 caracteres',
            'cnpj.required' => 'CNPJ é um campo obrigatório',
            'cnpj.min' => 'CNPJ mínimo 18 caracteres incluindo traços',
            'cnpj.max' => 'CNPJ máximo 18 caracteres incluindo traços',
            'telefone.required' => 'Telefone é um campo obrigatório',
            'telefone.min' => 'Telefone minimo 16 caracteres incluindo traços',
            'telefone.max' => 'Telefone máximo 16 caracteres incluindo traços',
            'endereco.required' => 'Endereço é um campo obrigatório',
            'endereco.min' => 'Endereço mínimo 5 caracteres',
            'endereco.max' => 'Endereço máximo 255 caracteres',
            'CEP.required' => "CEP é um campo obrigatório",
            'CEP.min' => 'CEP mínimo 9 caracteres',
            'CEP.max' => 'CEP máximo 9 caracteres',

        ];
        $this->validate($request, [
            'nome' => 'required|min:5|max:255',
            'cnpj' => 'required|min:18|max:18',
            'telefone' => 'required|min:16|max:16',
            'endereco' => 'required|min:5|max:255',
            'CEP' => 'required|min:9|max:9',
        ],$messages);
        $fornecedor  = new Fornecedor();
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->telefone = $request->telefone;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->CEP = $request->CEP;
        $fornecedor->save();
        return response()->json('Fornecedor Cadastrado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Fornecedor::find($id);
        return response()->json($editar);
    }
    public function atualizarFornecedores(Request $request,$id)
    {
        $messages = [
            'nome.required' => 'Nome é um campo obrigatório',
            'nome.min' => 'Nome mínimo 5 caracteres',
            'nome.max' => 'Nome máximo 255 caracteres',
            'cnpj.required' => 'CNPJ é um campo obrigatório',
            'cnpj.min' => 'CNPJ mínimo 18 caracteres incluindo traços',
            'cnpj.max' => 'CNPJ máximo 18 caracteres incluindo traços',
            'telefone.required' => 'Telefone é um campo obrigatório',
            'telefone.min' => 'Telefone minimo 16 caracteres incluindo traços',
            'telefone.max' => 'Telefone máximo 16 caracteres incluindo traços',
            'endereco.required' => 'Endereço é um campo obrigatório',
            'endereco.min' => 'Endereço mínimo 5 caracteres',
            'endereco.max' => 'Endereço máximo 255 caracteres',
        ];
        $this->validate($request, [
            'nome' => 'required|min:5|max:255',
            'cnpj' => 'required|min:18|max:18',
            'telefone' => 'required|min:16|max:16',
            'endereco' => 'required|min:5|max:255',
        ],$messages);
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
    public function pesquisarFornecedores(Request $request)
    {
        $search = $request->get('nome');
        $dados = DB::table('fornecedors')
        ->select('fornecedors.*')
        ->where('fornecedors.nome','LIKE','%'.$search.'%')
        ->get();
        return response()->json($dados);
    }
    
}
