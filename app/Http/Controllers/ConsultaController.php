<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Consulta;
use App\Colaborador;
use App\Cliente;
use DB; 

class ConsultaController extends Controller
{
    
    public function listarConsultas()
    {
        $consulta = DB::table('consultas')
        ->join('procedimentos','consultas.Procedimento_idProcedimento','=','procedimentos.id')
        ->join('clientes','consultas.Cliente_idCliente','=','clientes.id')
        ->join('pessoas','clientes.Pessoa_idPessoa','=','pessoas.id')
        ->select('pessoas.*','procedimentos.*','consultas.*')->get();

        // $consulta = DB::table('clientes')
        //     ->Join('consultas', 'consultas.Cliente_idCliente', '=', 'clientes.id')
        //     ->select('clientes.*')
        //     ->get();
        return response()->json($consulta);


        
    }
    public function cadastrarConsultas(Request $request)
    {
        $messages = [
            'Procedimento_idProcedimento.required' => 'Procedimento é um campo obrigatório',
            'hora.required' =>'Hora da Consulta é um campo obrigatório',
            'hora.date' => 'Hora da Consulta equivale somente a um campo data e hora',
            'Colaborador_idColaborador.required' => 'Colaborador é um  campo obrigatório',
            'Colaborador_idColaborador.integer' => 'Colaborador não existe em nosso sistema',
            'Cliente_idCliente.required' => 'Cliente é um campo obrigatório',
            'Cliente_idCliente.integer' => 'Cliente não existe em nosso sistema',
        ];
        $this->validate($request,[
            'Procedimento_idProcedimento' => 'required',
            'hora' => 'required|date',
            'Colaborador_idColaborador' => 'required|integer',
            'Cliente_idCliente' => 'required|integer',
        ],$messages);
        

        $time = Consulta::all();
        $consulta = new Consulta();
        $consulta->Procedimento_idProcedimento = $request->Procedimento_idProcedimento;
        $consulta->hora = $request->hora;
        $consulta->Colaborador_idColaborador = $request->Colaborador_idColaborador;
        $consulta->Cliente_idCliente = $request->Cliente_idCliente;
        foreach($time as $times)
        if($consulta->hora === $times->hora){
            return response()->json('Consulta já marcada nesse horário');
        }
        $consulta->save();
        return response()->json('Consulta Marcada Com Sucesso!!');
    }
    public function editar($id)
    {
        $editar = Consulta::find($id);
        return response()->json($editar);
    }
    public function atualizarConsulta(Request $request,$id)
    {
        $consulta = $request->all();
        Consulta::find($id)->update($consulta);
        return response()->json('Consulta Atualizado Com Sucesso!!');
    }
    public function deletarConsulta($id)
    {
        $consulta = Consulta::find($id);
        $del = $consulta->delete();
        return response()->json('Consulta Deletado Com Sucesso!!');
    }
  
}
