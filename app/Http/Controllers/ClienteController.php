<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cliente;
use App\Acompanhante;
use App\Pessoa;

class ClienteController extends Controller
{
    public function cadastrarCliente(Request $request)
    {
        // $mensagens = [
        //     'required' => 'O :attribute é obrigatório!',
        //     'nome.min' => 'É necessário no mínimo 5 caracteres no nome!!',
        //     'nome.max' => 'No Máximo 255 caracteres!!',
        //     'CPF.min' => 'É necessário no '
            
        // ];
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
            "nacionalidade" => ('O campo nacionalidade e Obrigatorio!!'),
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
    
        $cliente = new Cliente();
        $cliente->Pessoa_idPessoa = $pessoa->id;
        $cliente->Acompanhante_idAcompanhante = $request->acompanhante;
        $cliente->save();
        return response()->json('Cliente Cadastrado Com Sucesso!!');

    }
    public function listarCliente()
    {
        return response()->json(Cliente::all());
    }
    public function deletarCliente($id)
    {
        $cliente = Cliente::find($id);
        $del = $cliente->delete();
        return response()->json('Cliente Deletado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Cliente::find($id);
        return response()->json($editar);
    }
    public function atualizarCliente(Request $request,$id)
    {   
        $cliente = $request->all();
        Cliente::find($id)->update($cliente);
        return response()->json('Cliente Atualizado Com Sucesso!!');
    }
    
  
}
