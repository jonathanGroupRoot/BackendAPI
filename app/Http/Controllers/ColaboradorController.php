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
            'PIS' => 'required|min:14:max:14',
            'cargo' => 'required|min:5:max:255',
            'conta' => 'required|min:10:max:10',
            'tipoDaConta' => 'required|min:4|:max:20',
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
            "PIS.min" => ('O campo PIS tem que ter no mínimo 14 caracteres!!'),
            "PIS.max" => ('O campo PIS tem que ter no maxímo 14 caracteres!!'),
            "cargo.min" => ('O campo cargo tem que ter no minímo 5 caracteres'),
            "cargo.max" => ('O campo cargo tem que ter no maxímo 255 caracteres'),
            "conta.min" => ('O campo conta tem que ter no minímo 10 caracteres incluindo traço e digito da conta'),
            "conta.max" => ('O campo conta tem que ter no maxímo 10 caracteres incluindo traço e digito da conta'),
            "tipoDaConta.min" => ('No Minimo 4 caracteres'),
            "tipoDaConta.max" => ('No Maxímo 20 caracteres'),
            "agencia.min" => ('No Minimo 4 caracteres'),
            "agencia.max" => ('No Maxímo 4 caracteres'),
            "salario.required" => ('O campo salário e obrigatorio'),
            "dataDeAdmissao.required" => ('O campo data De Admissão e obrigatorio')
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
