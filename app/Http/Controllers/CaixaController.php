<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    

    public function saldoTotal(){
        $caixa =  new caixa();
        $caixa->valor->all();
        // $tot = 0;
        // foreach($caixa as $saldo){
        //     if($saldo->tipoDeEntrada) // se não colocar valor, ele já presume como TRUE
        //     {
        //         $tot += $saldo->valor;
        //     }else{
        //         $tot -= $saldo->valor;
        //     }
        // }
        return response()->json([$caixa]);
    }

    public function entradaCaixa(Request $request)
    {
        $caixa = new Caixa();
        $caixa->valor = $request->valor;
        $caixa->tipoDeEntrada = $request->tipoDeEntrada;
        $caixa->id_Colaborador = $request->colaborador;
        $caixa->id_Consulta = $request->consulta;
        foreach($caixa as $tot)
        if($tot->tipoDeEntrada === 1)
        {
            $tot += $caixa->valor;
        }else{
            $tot -= $caixa->valor;
        }
        $caixa->save();
        
        return response()->json('Alteração no Caixa!!');
    }
}

