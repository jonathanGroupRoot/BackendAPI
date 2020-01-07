<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Estoque;

class ExampleController extends Controller
{
    public function listarEstoque()
    {
        return response()->json(Estoque::all());
    }
    public function cadastrarEstoque(Request $request)
    {
        $material = new Material();
        $material->nome = $request->nome;
        $material->codigo = $request->codigo;
        $material->preco = $request->preco;
        
        $estoque = new Estoque();
        $estoque->quantidade = $request->quantidade;
        $estoque->data = $request->data;
        $estoque->Material_idMaterial = ;
    }
   
}
