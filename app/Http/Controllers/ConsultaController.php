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
        $consulta = DB::table('procedimentos')
        ->join('consultas','consultas.Procedimento_idProcedimento','=','procedimentos.id')
        ->select('consultas.id','consultas.hora','consultas.tipoDeAtendimento',
        'consultas.Procedimento_idProcedimento','consultas.Colaborador_idColaborador',
        'consultas.Cliente_idCliente')->get();
        return response()->json($consulta);
    }
    public function cadastrarConsultas(Request $request)
    {
        $messages = [
            'tipoDeAtendimento.required' => 'Tipo De Atendimento é um campo obrigatório',
            'tipoDeAtendimento.min' => 'Tipo De Atendimento mínimo 5 caracteres',
            'tipoDeAtendimento.max' => 'Tipo De Atendimento máximo 255 caracteres',
            'procedimento.required' => 'Procedimento é um campo obrigatório',
            'hora.required' => 'Hora da Consulta é um campo obrigatório',
            'hora.date' => 'Hora da Consulta equivale somente a um campo data e hora',
            'Colaborador_idColaborador.required' => 'Colaborador é um  campo obrigatório',
            'Colaborador_idColaborador.integer' => 'Colaborador não existe em nosso sistema',
            'Cliente_idCliente.required' => 'Cliente é um campo obrigatório',
            'Cliente_idCliente.integer' => 'Cliente não existe em nosso sistema',
        ];
        $this->validate($request,[
            'tipoDeAtendimento' => 'required|min:5|max:255',
            'procedimento' => 'required',
            'hora' => 'required|date',
            'Colaborador_idColaborador' => 'required|integer',
            'Cliente_idCliente' => 'required|integer',
        ],$messages);
        

        $time = Consulta::all();
        $consulta = new Consulta();
        $consulta->tipoDeAtendimento = $request->tipoDeAtendimento;
        $consulta->Procedimento_idProcedimento = $request->procedimento;
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
