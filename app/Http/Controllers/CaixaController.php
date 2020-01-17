<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caixa;

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
        return response()->json('Alteração no Caixa!!');
    }
    public function somarCaixa(Request $request)
    {
        $soma = new Caixa();
        $soma->valor = $soma + valor;
        $soma->tipoDeEntrada = $request->tipoDeEntrada;
        $soma->save();
        return response()->json('Somado ao caixa');
    }
}
