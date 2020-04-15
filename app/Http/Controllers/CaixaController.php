<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Caixa;
use App\Colaborador;
use DB;

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
        $messages = [
            'valor.required' => 'Valor é um campo obrigatório',
            'tipoDeEntrada.required' => 'Tipo de entrada é um campo obrigatório',
            'colaborador.required' => 'Nome do colaborador é um campo obrigatório',
            'consulta.required' => 'Nome da consulta é um campo obrigatório',
        ];
        $this->validate($request, [
            'valor' => 'required|integer',
            'tipoDeEntrada' => 'required|boolean',
            'colaborador' => 'required',
            'consulta' => 'required',
        ],$messages);
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
    public function retornaSaldo(Request $request)
    {
        $dados = DB::table('caixas')
        ->select('caixas.*')
        ->get();
        $dadosColaborador = DB::table('colaboradors')
        ->join('caixas.id_colaborador', '=', 'colaboradors.id')
        ->select('colaboradors.*')
        ->get();
        return response()->json(['caixa' => $dados,'dadosColaborador' => $dadosColaborador]);

    }
}

