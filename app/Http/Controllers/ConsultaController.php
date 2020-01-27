<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\Colaborador;
use App\Cliente;


class ConsultaController extends Controller
{
    public function listarConsultas()
    {
        return response()->json(Consulta::all());
    }
    public function cadastrarConsultas(Request $request)
    {
        $messages = [
            'tipoDeAtendimento.required' => 'Tipo De Atendimento é um campo obrigatório',
            'tipoDeAtendimento.min' => 'Tipo De Atendimento mínimo 5 caracteres',
            'tipoDeAtendimento.max' => 'Tipo De Atendimento máximo 255 caracteres',
            'procedimento.required' => 'Procedimento é um campo obrigatório',
            'hora.required' => 'Hora da Consulta é um campo obrigatório',
            'hora.DateTime' => 'Hora da Consulta equivale somente a um campo data e hora',
            'Colaborador_idColaborador.required' => 'Colaborador é um  campo obrigatório',
            'Cliente_idCliente.required' => 'Cliente é um campo obrigatório',
           
        ];
        $this->validate($request,[
            'tipoDeAtendimento' => 'required|min:5|max:255',
            'procedimento' => 'required|min:5|max:255',
            'hora' => 'required|DateTime',
            'Colaborador_idColaborador' => 'required',
            'Cliente_idCliente' => 'required',
        ],$messages);
      
        $consulta = new Consulta();
        $consulta->tipoDeAtendimento = $request->tipoDeAtendimento;
        $consulta->Procedimento_idProcedimento = $request->procedimento;
        $consulta->hora = $request->hora;
        $consulta->Colaborador_idColaborador = $request->colaborador;
        $consulta->Cliente_idCliente = $request->cliente;
        $consulta->save();
        return response()->json('Consulta Marcado Com Sucesso!!');

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
