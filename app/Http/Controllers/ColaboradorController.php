<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Colaborador;
use App\Pessoa;
use DB;
class ColaboradorController extends Controller
{

    public function listarColaboradores()
    {
        $colaborador = DB::table('pessoas')
        ->join('colaboradors','colaboradors.Pessoa_idPessoa', '=','pessoas.id')
        ->select('pessoas.id','pessoas.nome','pessoas.CPF','pessoas.RG','pessoas.endereco',
        'pessoas.CEP','pessoas.telefone','pessoas.sexo','pessoas.nacionalidade','pessoas.motivo','pessoas.ativo',
        'colaboradors.id','colaboradors.PIS','colaboradors.cargo','colaboradors.conta','colaboradors.tipoDaConta',
        'colaboradors.agencia','colaboradors.salario','colaboradors.dataDeAdmissao')->get();
        return response()->json($colaborador);
    }
    public function cadastrarColaboradores(Request $request)
    {
        $messages = [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'Minímo 5 caracteres',
            'nome.max' => 'Máximo 255 caracteres',
            'CPF.required' => 'O CPF é obrigatório',
            'CPF.min' => 'CPF mínimo 14 caracteres incluindo traços',
            'CPF.max' => 'CPF máximo 14 caracteres incluindo traços',
            'CPF.unique' => 'O CPF digitado já está cadastrado',
            'CEP.required' => 'CEP é um campo obrigatório',
            'CEP.min' => 'CEP mínimo 9 caracteres incluindo traços',
            'CEP.max' => 'CEP máximo 9 caracteres incluindo traços',
            'dataDeNascimento.required' => 'Esse campo é obrigatório',
            'dataDeNascimento.date' => 'O campo Data de nascimento equivale somente a uma data',
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
            'ativo.required' => 'Ativo é um campo obrigatório',
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
            'conta.unique' => 'Conta já cadastrado no sistema',
            'tipoDaConta.required' => 'Tipo Da Conta é um campo obrigatório',
            'tipoDaConta.min' => 'Tipo Da Conta mínimo 5 caracteres',
            'tipoDaConta.max' => 'Tipo Da Conta máximo 20 caracteres',
            'agencia.required' => 'Agência é um campo obrigatório',
            'agencia.min' => 'Agência Mínimo 4 caracteres',
            'agencia.max' => 'Agência Máximo 4 caracteres',
            'salario.required' => 'Salário é um campo obrigatório',
            'salario.integer' => 'Este Campo Deve ser do Tipo númerico',
            'dataDeAdmissao.required' => 'Data De Admissao é um campo Obrigatório',
            'dataDeAdmissao.date' => 'Esse campo equivale somente a uma data verifique e digite novamente', 
        ];
        $this->validate($request,[
            'nome' => 'required|min:5|max:255',
            'CPF' => 'required|min:14|max:14|bail|unique:pessoas,CPF',
            'CPF.*.first_name' => 'required_with:CPF.*.last_name',
            'CEP' => 'required|min:9|max:9',
            'dataDeNascimento' => 'required|date',
            'RG' => 'required|min:7|max:7|bail|unique:pessoas,RG',
            'RG.*.first_name' => 'required_with:RG.*.last_name',
            'endereco' => 'required|min:5|max:255',
            'telefone' => 'required|min:16|max:16',
            'sexo' => 'required',
            'nacionalidade' => 'required',
            'ativo' => 'required|boolean',
            'PIS' => 'required|min:14|max:14|bail|unique:colaboradors,PIS',
            'PIS.*.first_name' => 'required_with:PIS.*.last_name',
            'cargo' => 'required|min:5|max:255',
            'conta' => 'required|min:10|max:10|unique:colaboradors,conta',
            'tipoDaConta' => 'required|min:5|max:20',
            'agencia' => 'required|min:4|max:4',
            'salario' => 'required|integer',
            'dataDeAdmissao' => 'required|date',

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
