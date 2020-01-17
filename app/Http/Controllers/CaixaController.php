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
        foreach($caixa as $caixa)
        if($caixa->tipoDeEntrada===1){
            $caixa += $caixa->valor;
        }else{
            $caixa -= $caixa->valor;
        }
        endforeach
        return response()->json('Alteração no Caixa!!');
    }
 
}
