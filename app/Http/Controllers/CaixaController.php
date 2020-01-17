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
        @foreach($caixa as $caixas)
        if($caixas->tipoDeEntrada===1){
            $caixas += $caixas->valor;
        }else{
            $caixas -= $caixas->valor;
        }
        @endforeach
        return response()->json('Alteração no Caixa!!');
    }
 
}
