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
        $this->validate($request,[
            'nome' => 'required|min:5|max:255',
            'CPF' => 'required|min:14|max:14|unique:pessoas,CPF',
            'CEP' => 'required|min:9|max:9',
            'dataDeNascimento' => 'required',
            'RG' => 'required|min:7|max:7|unique:pessoas,RG',
            'endereco' => 'required|min:5|max:255',
            'telefone' => 'required|min:16|max:16',
            'sexo' => 'required',
            'nacionalidade' => 'required',
            'PIS' => 'required|min:14|max:14|unique:colaboradors,PIS',
            'cargo' => 'required|min:5|max:255',
            'conta' => 'required|min:10|max:10',
            'tipoDaConta' => 'required|min:5|max:20',
            'agencia' => 'required|min:4|max:4',
            'salario' => 'required',
            'dataDeAdmissao' => 'required'
        ],[
            "nome.min" => ('No Mínimo 5 Caracteres!!'),
            "nome.max" => ('No Máximo 255 Caracteres!!'),
            "CPF.min" => ('No Mínimo 14 Caracteres!!'),
            "CPF.max" => ('No Máximo 14 Caracteres!!'),
            "CPF.unique" => ('O CPF Digitado já existe no sistema verifique e tente novamente!!'),
            "CEP.min" => ('No Mínimo 9 Caracteres!!'),
            "CEP.max" => ('No Máximo 9 Caracteres!!'),
            "dataDeNascimento.required" => ('Campo Obrigatório!!'),
            "RG.min" => ('No Mínimo 7 Caracteres!!'),
            "RG.max" => ('No Máximo 7 Caracteres!!'),
            "RG.unique" =>('O RG digitado já existe no sistema verifique e tente novamente!!'),
            "endereco.min" => ('No Mínimo 5 Caracteres!!'),
            "endereco.max" => ('No Máximo 255 Caracteres!!'),
            "telefone.min" => ('No Mínimo 16 Caracteres!!'),
            "telefone.max" => ('No Máximo 16 Caracteres!!'),
            "sexo.required" => ('O campo sexo e Obrigatorio!!'),
            "nacionalidade" => ('O campo nacionalidade e Obrigatorio!!'),
            "PIS.min" => ('Mínimo 14 Caracteres!!'),
            "PIS.max" => ('Máximo 14 Caracteres!!'),
            "PIS.required" => ('O campo é obrogatório'),
            "cargo.min" => ('Mínimo 5 Caracteres!!'),
            "cargo.max" => ('Máximo 255 Caracteres!!'),
            "conta.min" => ('Mínimo 10 Caracteres!!'),
            "conta.max" => ('Máximo 10 Caracteres!!'),
            "conta.required" => ('O campo é Obrigatório!!'),
            "tipoDaConta.min" => ('Mínimo 5 Caracteres!!'),
            "tipoDaConta.max" => ('Máximo 5 Caracteres!!'),
            "tipoDaConta.required" => ('O Campo é Obrigatório!!'),
            "agencia.min" => ('Mínimo 4 Caracteres!!'),
            "agencia.max" => ('Máximo 4 Caracteres!!'),
            "agencia.required" => ('O Campo é Obrigatório!!'),
            "salario.required" => ('O Campo é Obrigatório!!'),
            "dataDeAdmissão" => ('O Campo é Obrigatório!!')
        ]);
 
    $pessoa = new Pessoa();
    $pessoa->nome = $request->nome;
    $pessoa->CPF = $request->CPF;
    $pessoa->CEP = $request->CEP;
    $pessoa->dataDeNascimento = $request->dataDeNascimento;
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
    public function editar($id)
    {
        $editar = Dentista::find($id);
        return response()->json($editar);
    }
    public function atualizar(Request $request, $id){
    $dentista = $request->all();
    Dentista::find($id)->update($dentista);
    return response()->json('Atualizado Com Sucesso!!');
    }
  
}

