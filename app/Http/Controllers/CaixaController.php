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
       foreach($caixa as $tot)
       if($caixa->tipoDeEntrada === 1)
       {
           $caixa->valor = $tot++;
       }
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
