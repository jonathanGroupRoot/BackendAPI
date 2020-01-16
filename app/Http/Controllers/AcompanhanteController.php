<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pessoa;
use App\Acompanhante;

class AcompanhanteController extends Controller
{
    public function cadastrarAcompanhante(Request $request)
    {
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

        $acompanhante = new Acompanhante();
        $acompanhante->responsavel = $request->responsavel;
        $acompanhante->Pessoa_idPessoa = $pessoa->id;
        $acompanhante->save();
        return response()->json('Acompanhante Cadastrado Com Sucesso!!');

    }
    public function listarAcompanhante()
    {
        return response()->json(Acompanhante::all());
    }
    public function deletarAcompanhante($id)
    {
        $acompanhante = Acompanhante::find($id);
        $del = $acompanhante->delete();
        return response()->json('Acompanhante Deletado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Acompanhante::find($id);
        return response()->json($editar);
    }
    public function atualizarAcompanhante(Request $request,$id)
    {
        $acompanhante = $request->all();
        Acompanhante::find($id)->update($acompanhante);
        return response()->json('Acompanhante Atualizado Com Sucesso!!');
    }
   

}
