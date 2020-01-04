<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dentista;
use App\Pessoa;
use App\Colaborador;

class DentistaController extends Controller
{
    
    public function listDentista()
    {
        return response()->json(Dentista::all());
    }
    public function cadastrarDentista(Request $request)
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

    $dentista = new Dentista();
    $dentista->CRO = $request->CRO;
    $dentista->especialidades = $request->especialidades;
    $dentista->responsavelTecnico = $request->responsavelTecnico;
    $dentista->Colaborador_idColaborador = $colaborador->id;
    $dentista->save();
    return response()->json('Cadastrado Com Sucesso!!!');

    }
    public function deleteDentista($id)
    {
    $dentista = Pessoa::find($id);
    $delet = $dentista->delete();
    return response()->json('Deletado Com Sucesso');
        
    }
    public function atualizar(Request $request, $id){
    $dentista = $request->all();
    Dentista::find($id)->update($dentista);
    return response()->json('Atualizado Com Sucesso!!');
    }
  
}

