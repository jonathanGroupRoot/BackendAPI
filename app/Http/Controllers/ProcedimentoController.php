<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Procedimento;
use DB;
use App\Http\Controllers\Input;

class ProcedimentoController extends Controller
{
    public function listarProcedimento()
    {
        return response()->json(Procedimento::all());
    }
    public function cadastrarProcedimento(Request $request)
    {
        $messages = [
            'tipo.required' => 'Tipo do procedimento é um campo obrigatório',
            'tipo.min' => 'Tipo do procedimento mínimo 5 caracteres',
            'tipo.max' => 'Tipo do procedimento máximo 255 caracteres',
            'valor.required' => 'Valor é um campo obrigatório',
            'valor.integer' => 'O campo valor equivale somente a um valor númerico',
        ];
        $this->validate($request, [
            'tipo' => 'required|min:5|max:255',
            'valor' => 'required|integer',
        ],$messages);
        $procedimento = new Procedimento();
        $procedimento->tipo = $request->tipo;
        $procedimento->valor = $request->valor;
        $procedimento->descricao = $request->descricao;
        $procedimento->save();
        return response()->json('Procedimento Cadastrado Com Sucesso');

    }
    public function deletarProcedimento($id)
    {
        $registros = Procedimento::find($id);
        $del = $registros->delete();
        return response()->json('Procedimento Deletado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Procedimento::find($id);
        return response()->json($editar);
    }
 
    public function atualizarProcedimento(Request $request,$id)
    {
        $messages = [
            'tipo.required' => 'Tipo do procedimento é um campo obrigatório',
            'tipo.min' => 'Tipo do procedimento mínimo 5 caracteres',
            'tipo.max' => 'Tipo do procedimento máximo 255 caracteres',
            'valor.required' => 'Valor é um campo obrigatório',
            'valor.integer' => 'O campo valor equivale somente a um valor númerico',
        ];
        $this->validate($request, [
            'tipo' => 'required|min:5|max:255',
            'valor' => 'required|integer',
        ],$messages);
        $registros = $request->all();
        Procedimento::find($id)->update($registros);
        return response()->json('Atualizado Com Sucesso!!');
        
    }
    public function pesquisar(Request $request)
    {
        $search = $request->get('nome');
        $dados = DB::table('procedimentos')
        ->select('id','tipo','valor','descricao')
        ->where('tipo','LIKE','%'.$search.'%')
        ->get();
        return response()->json($dados);
    }

}
