<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    

    public function saldoTotal(){
        $caixa =  new caixa();
        foreach($caixa as $total)
        $caixa->valor->all();
        $caixa->save();

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
        $valor = 0;
        $caixa = new Caixa();
        $caixa->valor = $request->valor;
        $caixa->tipoDeEntrada = $request->tipoDeEntrada;
        $caixa->id_Colaborador = $request->colaborador;
        $caixa->id_Consulta = $request->consulta;
       if($caixa->tipoDeEntrada === 1){
           $caixa->valor += $valor;
       }else{
           $caixa->valor -= $valor;
       }
        $caixa->save();
        
        return response()->json('Alteração no Caixa!!');
    }
}

