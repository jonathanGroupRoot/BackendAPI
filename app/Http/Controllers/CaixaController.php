<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    

    public function saldoTotal(){
        $tot = 0;
        $caixa = Caixa::all();
        foreach($caixa as $saldo){
            if($saldo->tipoDeEntrada) // se não colocar valor, ele já presume como TRUE
            {
                $tot += $saldo->valor;
             }else{
                $tot -= $saldo->valor;
             }
         }
        return response()->json(['saldo'=>$tot]);
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
        return response()->json(['Alteração no Caixa!!']);
    }
}

