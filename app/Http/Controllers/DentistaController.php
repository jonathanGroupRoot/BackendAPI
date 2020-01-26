<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            'CPF.required' => 'O CPF é obrigatório',
        ];
        $validator = Validator::make($request->all(),[
            'nome' => 'bail|required|min:5|max:255',
            'CPF' => 'bail|required|min:14|max:14|unique:pessoas,CPF',
            'CEP' => 'bail|required|min:9|max:9',
            'dataDeNascimento' => 'bail|required',
            'RG' => 'bail|required|min:7|max:7|unique:pessoas,RG',
            'endereco' => 'bail|required|min:5|max:255',
            'telefone' => 'bail|required|min:16|max:16',
            'sexo' => 'bail|required',
            'nacionalidade' => 'required',
            'PIS' => 'bail|required|min:14|max:14|unique:colaboradors,PIS',
            'cargo' => 'bail|required|min:5|max:255',
            'conta' => 'bail|required|min:10|max:10',
            'tipoDaConta' => 'bail|required|min:5|max:20',
            'agencia' => 'bail|required|min:4|max:4',
            'salario' => 'bail|required',
            'dataDeAdmissao' => 'bail|required'
        ],$messages);
       if ($validator->fails())
       {
           $msg = 'Todo Validação Ok!';
           $error = $validator->errors();
       }
    else{
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

