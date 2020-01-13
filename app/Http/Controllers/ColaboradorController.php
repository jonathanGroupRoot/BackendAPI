<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Colaborador;
use App\Pessoa;

class ColaboradorController extends Controller
{

    public function listarColaboradores()
    {
        return response()->json(Colaborador::all());
    }
    public function cadastrarColaboradores(Request $request)
    {
        $pessoa = new Pessoa();
        $pessoa->nome = $request->nome;
        $pessoa->CPF = $request->CPF;
        $pessoa->dataDeNascimento = $request->dataDeNascimento;
        $pessoa->dataDeCadastro = $request->dataDeCadastro;
        $pessoa->RG = $request->RG;
        $pessoa->endereco = $request->endereco;
        $pessoa->telefone = $request->telefone;
        $pessoa->sexo = $request->sexo;
        $pessoa->nacionalidade = $request->nacionalidade;
        $pessoa->ativo = $request->ativo;
        $pessoa->save();

        $colaborador = new Colaborador();
        $colaborador->PIS = $request->PIS;
        $colaborador->cargo = $request->cargo;
        $colaborador->conta = $request->conta;
        $colaborador->tipoDaConta = $request->tipoDaConta;
        $colaborador->agencia = $request->agencia;
        $colaborador->salario = $request->salario;
        $colaborador->dataDeAdmissao = $request->dataDeAdmissao;
        $colaborador->Pessoa_idPessoa = $pessoa->id;
        $colaborador->save();
        return response()->json('Colaborador Cadastrado Com Sucesso!!');
    }
    public function deletarColaboradores(Request $request,$id)
    {
        $colaborador = Colaborador::find($id);
        $del = $colaborador->delete();
        return response()->json('Colaborador Deletado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Colaborador::find($id);
        return response()->json($editar);
    }
    public function atualizarColaboradores(Request $request,$id)
    {
        $colaborador = $request->all();
        Colaborador::find($id)->update($colaborador);
        return response()->json('Dados Atualizados Com Sucesso!!');
    }


}
