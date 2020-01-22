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
        $this->validate($request,[
            'tipoDeAtendimento' => 'required|min:5|max:255',
            'procedimento' => 'required|min:5|max:255',
            'hora' => 'required'
        ],[
            "tipoDeAtendimento.min" => ('Mínimo de 5 Caracteres'),
            'tipoDeAtendimento.max' => ('Máximo de 255 Caracteres'),
            'hora.required' => ('O campo hora e obrigatório')
        ]);
      
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
