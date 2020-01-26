<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
        $messages = [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'Minímo 5 caracteres',
            'nome.max' => 'Máximo 255 caracteres',
            'CPF.required' => 'O CPF é obrigatório',
            'CPF.min' => 'CPF mínimo 14 caracteres incluindo traços',
            'CPF.max' => 'CPF máximo 14 caracteres incluindo traços',
            'CPF.unique' => 'O CPF digitado já está cadastrado',
            'CEP.min' => 'CEP mínimo 9 caracteres incluindo traços',
            'CEP.max' => 'CEP máximo 9 caracteres incluindo traços',
            'dataDeNascimento.required' => 'Esse campo é obrigatório',
            'RG.required' => 'RG é obrigatório',
            'RG.min' => 'RG mínimo 7 caracteres incluindo traços',
            'RG.max' => 'RG máximo 7 caracteres incluindo traços',
            'RG.unique' => 'O RG digitado já está cadastrado no sistema',
            'endereco.required' => 'Endereço e obrigatório',
            'endereco.min' => 'Endereço mínimo 5 caracteres',
            'endereco.max' => 'Endereco máximo 5 caracteres',
            'telefone.required' => 'Telefone é um campo obrigatório',
            'telefone.min' => 'Telefone mínimo 16 caracteres incluindo traços',
            'telefone.max' => 'Telefone máximo 16 caracteres incluindo traços',
            'sexo.required' => 'Este campo é obrigatório',
            'nacionalidade.required' => 'Este campo é obrigatório',
            'PIS.required' => 'PIS é obrigatório',
            'PIS.min' => 'PIS mínimo 14 caracteres incluindo traços',
            'PIS.max' => 'PIS máximo 14 caracteres incluindo traços',
            'PIS.unique' => 'O PIS digitado já está cadastrado no sistema',
            'cargo.required' => 'Cargo é um campo obrigatório',
            'cargo.min' => 'Cargo mínimo 5 caracteres',
            'cargo.max' => 'Cargo máximo 5 caracteres',
            'conta.required' => 'Conta é um campo obrigatório',
            'conta.min' => 'Conta mínimo 10 caracteres incluindo traços',
            'conta.max' => 'Conta máximo 10 caracteres incluindo traços',
            'tipoDaConta.required' => 'Tipo Da Conta é um campo obrigatório',
            'tipoDaConta.min' => 'Tipo Da Conta mínimo 5 caracteres',
            'tipoDaConta.max' => 'Tipo Da Conta máximo 20 caracteres',
            'agencia.required' => 'Agência é um campo obrigatório',
            'agencia.min' => 'Agência Mínimo 4 caracteres',
            'agencia.max' => 'Agência Máximo 4 caracteres',
            'salario.required' => 'Salário é um campo obrigatório',
            'CRO.required' => 'CRO é um campo Obrigatório',
            'CRO.min' => 'CRO Mínimo 5 Caracteres',
            'CRO.max' => 'CRO máximo 5 Caracteres',
            'dataDeAdmissao.required' => 'Data De Admissao é um campo Obrigatório',
        ];

             $this->validate($request, [
                'nome' => 'required|min:5|max:255',
                'CPF' => 'required|min:14|max:14|bail|unique:pessoas,CPF',
                'CEP' => 'required|min:9|max:9',
                'dataDeNascimento' => 'required',
                'RG' => 'required|min:7|max:7|bail|unique:pessoas,RG',
                'endereco' => 'required|min:5|max:255',
                'telefone' => 'required|min:16|max:16',
                'sexo' => 'required',
                'nacionalidade' => 'required',
                'PIS' => 'required|min:14|max:14|bail|unique:colaboradors,PIS',
                'cargo' => 'required|min:5|max:255',
                'conta' => 'required|min:10|max:10',
                'tipoDaConta' => 'required|min:5|max:20',
                'agencia' => 'required|min:4|max:4',
                'salario' => 'required',
                'CRO' => 'required|min:5|max:5',
                'dataDeAdmissao' => 'required'
            ],$messages);

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

