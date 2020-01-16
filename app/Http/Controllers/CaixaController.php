<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Colaborador;
use App\Consulta;

class CaixaController extends Controller
{
    public function entradaCaixa(Request $request)
    {
        $colaborador = new Colaborador();
        $consulta = new Consulta();

        $caixa = new Caixa();
        $caixa->valor = $request->valor;
        $caixa->tipoDeEntrada = $request->tipoDeEntrada;
        $caixa->id_Colaborador = $colaborador->id;
        $caixa->id_Consulta = $consulta->id;
        $caixa->save();
        return response()->json('Deu Certo');
        
    }
}
