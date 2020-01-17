<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    

    public function saldoTotal(){
        $caixa = Caixa::all();
        $tot = 0;
        foreach($caixa as $saldo)
        if($saldo->tipoDeEntrada) // se não colocar valor, ele já presume como TRUE
        {
            $tot += $saldo->valor;
        }else{
            $tot -= $saldo->valor;
        }
        return response()->json(['saldo'=>$tot]);
    }

    public function entradaCaixa(Request $request)
    {
        $caixa = new Caixa();
        $caixa->valor = $request->valor;
        $caixa->tipoDeEntrada = $request->tipoDeEntrada;
        $caixa->id_Colaborador = $request->colaborador;
        $caixa->id_Consulta = $request->consulta;




        $caixa->save();
        // foreach($caixa as $caixas)
        // if($caixa->tipoDeEntrada === 1){
        //     $caixa += $caixas->valor;
        // }else{
        //     $caixa -= $caixas->valor;
        // }
        return response()->json('Alteração no Caixa!!');
    }
 
}
