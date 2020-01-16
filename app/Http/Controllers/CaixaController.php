<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Colaborador;
use App\Consulta;

class CaixaController extends Controller
{
    public function entradaCaixa(Request $request)
    {
        $caixa = new Caixa();
        $caixa->valor = $request->valor;
        $caixa->tipoDeEntrada = $request->tipoDeEntrada;
        $caixa->id_Colaborador = $request->colaborador;
        $caixa->id_Consulta = $request->consulta;
        $caixa->save();
        return response()->json('Deu Certo');
        
    }
}
