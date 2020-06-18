<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Estoque;
use App\Fornecedor;
use App\Material;
use DB;
use App\Entrada;

class EstoqueController extends Controller
{
    public function listarEstoque()
    {
        $dados = DB::table('materials')
        ->join('estoques','estoques.Material_idMaterial', '=', 'materials.id')
        ->select('materials.*','estoques.*')
        ->get();
        return  response()->json($dados);
    }
    public function cadastrarEstoque(Request $request)
    {
        $messages = [
            'quantidade.required' => 'Quantidade é um campo obrigatório',
            'quantidade.integer' => 'Quantidade equivale a somente valores inteiros',
            'data.required' => 'Data é um campo obrigatório',
            'data.date' => 'Data equivale somente a um campo tipo data',
            'Material_idMaterial.required' => 'Material é um campo obrigatório',
            'Material_idMaterial.integer' => 'Material não cadastrado no sistema',
        ];
        $this->validate($request,[
            'quantidade' => 'required|integer',
            'data' => 'required|date',
            'Material_idMaterial' => 'required|integer',
        ],$messages);
        $estoque = new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->data = $request->data;
        $estoque->Material_idMaterial = $request->Material_idMaterial;
        $estoque->save();
        return response()->json('Estoque Cadastrado Com Sucesso!!');
    }
    public function deletarEstoque($id)
    {
        $estoque = Estoque::find($id);
        $del = $estoque->delete();
        return response()->json('Estoque Deletado Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Estoque::find($id);
        return response()->json($editar);
    }
    public function atualizarEstoque(Request $request,$id)
    {
        $estoque = $request->all();
        Estoque::find($id)->update($estoque);
        return response()->json('Estoque Atualizado Com Sucesso!!');
    }
    public function pesquisarEstoque(Request $request)
    {
        $filtro = $request->get('nome');
        $dados = DB::table('materials')
        ->join('estoques','estoques.Material_idMaterial', '=', 'materials.id')
        ->select('materials.*','estoques.*')
        ->where('materials.nome','LIKE','%'.$filtro.'%')
        ->get();
        return  response()->json($dados);
    }
    
}
