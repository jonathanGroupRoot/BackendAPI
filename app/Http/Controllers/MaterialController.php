<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
       $fornecedor = new Fornecedor(); 
       $fornecedor->nome = $request->nomeFornecedor;
       $fornecedor->cnpj = $request->cnpj;
       $fornecedor->telefone = $request->telefone;
       $fornecedor->endereco = $request->endereco;
       $fornecedor->save();

       $material = new Material();
       $material->nome = $request->nome;
       $material->codigo = $request->codigo;
       $material->preco = $request->preco;
       $material->Fornecedor_idFornecedor = $fornecedor->id;
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
}
