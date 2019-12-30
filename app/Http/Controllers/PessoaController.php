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
        $request = Pessoa::all();
        $cad = new Pessoa;
        $cad->nome = $request->nome;
        $cad->cpf = $request->cpf;
        $cad->dataDeNascimento = $request->dataDeNascimento;
        $cad->dataDeCadastro = $request->dataDeCadastro;
        $cad->rg = $request->rg;
        $cad->endereco = $request->endereco;
        $cad->telefone = $request->telefone;
        $cad->sexo = $request->sexo;
        $cad->nacionalidade = $request->nacionalidade;
        $cad->ativo = $request->ativo;
        $cad->save();
    }

    
}
