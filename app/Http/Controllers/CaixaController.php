<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    

    public function saldoTotal(){
        $caixa = Caixa::all();
        $tot = 0;
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
}
