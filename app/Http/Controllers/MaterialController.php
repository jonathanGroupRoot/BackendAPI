<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Material;
use App\Fornecedor;

class MaterialController extends Controller
{
   public function listarMaterial()
   {
       return response()->json(Material::all());
   }
   public function cadastrarMaterial(Request $request)
   {
       $messages = [
            'nome.required' => 'Nome é um campo obrigatório',
            'nome.min' => 'Nome mínimo 5 caracteres',
            'nome.max' => 'Nome máximo 255 caracteres',
            'codigo.required' => 'Código do produto é um campo obrigatório',
            'codigo.min' => 'Código do produto mínimo 2 caracteres',
            'codigo.max' => 'Código do produto máximo 255 caracteres',
            'preco.required' => 'Preço é um campo obrigatório',
            'preco.integer' => 'Preço é um campo equivalente somente a valores inteiros',
            'Fornecedor_idFornecedor.required' => 'Fornecedor é um campo obrigatório',
            'Fornecedor_idFornecedor.integer' => 'Fornecedor não existe no sistema',
       ];
       $this->validate($request,[
            'nome' => 'required|min:5|max:255',
            'codigo' => 'required|min:2|max:255',
            'preco' => 'required|integer',
            'Fornecedor_idFornecedor' => 'required|integer',

       ],$messages);
    //    $fornecedor = new Fornecedor(); 
    //    $fornecedor->nome = $request->nomeFornecedor;
    //    $fornecedor->cnpj = $request->cnpj;
    //    $fornecedor->telefone = $request->telefone;
    //    $fornecedor->endereco = $request->endereco;
    //    $fornecedor->save();

       $material = new Material();
       $material->nome = $request->nome;
       $material->codigo = $request->codigo;
       $material->preco = $request->preco;
       $material->Fornecedor_idFornecedor = $request->Fornecedor_idFornecedor;
       $material->save();
       return response()->json('Material Cadastrado Com Sucesso!!');
   }
   public function deletarMaterial($id)
   {
        $material = Material::find($id);
        $del = $material->delete();
        return response()->json('Material Deletado Com Sucesso!!');
   }
   public function editar($id)
   {
       $editar = Material::find($id);
       return response()->json($editar);
   }
   public function atualizarMaterial(Request $request,$id)
   {
        $material = $request->all();
        Material::find($id)->update($material);
        return response()->json('Material Atualizado Com Sucesso!!');
   }
   public function pesquisarMateriais(Request $request)
   {
        $filtro = $request->get('nome');
        $dados = DB::table('materials')
        ->select('materials.*')
        ->where('materials.nome','LIKE','%'.$filtro.'%')
        ->get();
        return response()->json($dados);

   }
}
