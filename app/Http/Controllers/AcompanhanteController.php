<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Pessoa;
use App\Acompanhante;
use DB;

class AcompanhanteController extends Controller
{
    public function cadastrarAcompanhante(Request $request)
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
            'sexo' => 'required|boolean',
            'nacionalidade' => 'required',
            'ativo' => 'required|boolean',
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

        $acompanhante = new Acompanhante();
        $acompanhante->responsavel = $request->responsavel;
        $acompanhante->Pessoa_idPessoa = $pessoa->id;
        $acompanhante->save();
        return response()->json('Acompanhante Cadastrado Com Sucesso!!');

    }
    public function listarAcompanhante()
    {
        $acompanhante = DB::table('pessoas')
        ->join('acompanhantes','acompanhantes.Pessoa_idPessoa', '=','pessoas.id')
        ->select('acompanhantes.id','acompanhantes.Pessoa_idPessoa','acompanhantes.responsavel','acompanhantes.created_at',
        'pessoas.nome','pessoas.CPF','pessoas.RG','pessoas.endereco','pessoas.dataDeNascimento',
        'pessoas.CEP','pessoas.telefone','pessoas.sexo','pessoas.nacionalidade','pessoas.motivo','pessoas.ativo')
        ->get();
        return response()->json($acompanhante);        
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
