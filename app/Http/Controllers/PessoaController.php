<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function list()
    {
        return response()->json(Pessoa::all());
    }
    public function cadastrarPessoa(Request $request)
    {
        $registros = new Pessoa;
        $registros->nome = $request->nome;
        $registros->CPF = $request->CPF;
        $registros->dataDeNascimento = $request->dataDeNascimento;
        $registros->dataDeCadastro = $request->dataDeCadastro;
        $registros->RG = $request->RG;
        $registros->endereco = $request->endereco;
        $registros->telefone = $request->telefone;
        $registros->sexo = $request->sexo;
        $registros->nacionalidade = $request->nacionalidade;
        $registros->ativo = $request->ativo;
        $registros->save();
        return response()->json('Cadastrado Com Sucesso!!');
    }
    public function delete($id)
    {
        $pessoa = Pessoa::find($id);
        $del = $pessoa->delete();
        return response()->json('Deletado Com Sucesso!!');
    }
    public function atualizar(Request $request,$id){

        $registros = $request->all();
        Pessoa::find($id)->update($registros);
        return response()->json('Atualizado Com Sucesso!!');
    }
    
}
