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
        $this->validate($request,[
            'nome' => 'required|min:5|max:255',
            'CPF' => 'required|min:14|max:14|unique:pessoas,CPF',
            'CEP' => 'required|min:9|max:9',
            'dataDeNascimento' => 'required',
            'RG' => 'required|min:7|max:7|unique:pessoas,RG',
            'endereco' => 'required|min:5|max:255',
            'telefone' => 'required|min:16|max:16',
            'sexo' => 'required',
            'nacionalidade' => 'required'
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
            "nacionalidade.required" => ('O campo nacionalidade e Obrigatorio!!'),
        ]);
        $registros = new Pessoa;
        $registros->nome = $request->nome;
        $registros->CPF = $request->CPF;
        $registros->CEP = $request->CEP;
        $registros->dataDeNascimento = $request->dataDeNascimento;
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
    public function editar($id)
    {
        $editar = Pessoa::find($id);
        return response()->json($editar);
    }
    public function atualizar(Request $request,$id){

        $registros = $request->all();
        Pessoa::find($id)->update($registros);
        return response()->json('Atualizado Com Sucesso!!');
    }
    
}
