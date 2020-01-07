<?php

namespace App\Http\Controllers;
use App\Entrada;
use App\Colaborador;

class EntradaController extends Controller
{
    public function listarEstoque()
    {
        return response()->json(Estoque::all());
    }

}
