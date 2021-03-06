<?php

namespace App\Http\Controllers;
use\Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Prontuario;
use App\Dentista;
use App\Consulta;
use DB;

class ProntuarioController extends Controller
{
    public function listarProntuarios()
    {
        $prontuario = DB::table('prontuarios')
        ->join('consultas','prontuarios.Consulta_idConsulta','=','consultas.id')
        ->join('clientes','consultas.Cliente_idCliente','=','clientes.id')
        ->join('pessoas','clientes.Pessoa_idPessoa','=','pessoas.id')
        ->select('pessoas.*','prontuarios.*')
        ->get();
        return response()->json($prontuario);
    }
    public function cadastrarProntuarios(Request $request)
    {
        $messages = [
            'dataDoProcedimento.required' => 'Data Do Procedimento é um campo obrigatório',
            'dataDoProcedimento.date' => 'Data Do Procedimento só é permitido caracteres do tipo data',
            'numeracaoDoDente.required' => 'Númeração do dente é um campo obrigatório',
            'numeracaoDoDente.integer' => 'Númeração do dente só é permitidos caracteres do tipo número',
            'Dentista_idDentista.required' => 'Colaborador é um campo obrigatório',
            'Consulta_idConsulta.required' => 'Selecione uma consulta',
        ];
        $this->validate($request,[
            'dataDoProcedimento' => 'required|date',
            'numeracaoDoDente' => 'required|integer',
            'Dentista_idDentista' => 'required|integer',
            'Consulta_idConsulta' => 'required|integer',
        ],$messages);

        $prontuario = new Prontuario();
        $prontuario->dataDeRetorno = $request->dataDeRetorno;
        $prontuario->dataDoProcedimento = $request->dataDoProcedimento;
        $prontuario->numeracaoDoDente = $request->numeracaoDoDente;
        $prontuario->Dentista_idDentista = $request->Dentista_idDentista;
        $prontuario->Consulta_idConsulta = $request->Consulta_idConsulta;
        $prontuario->save();
        return response()->json('Prontuario cadastrado com sucesso!');
    }
    public function editarProntuarios($id)
    {
        $prontuario = DB::table('prontuarios')
        ->join('consultas','prontuarios.Consulta_idConsulta','=','consultas.id')
        ->select('prontuarios.*')
        ->where('prontuarios.id','=',$id)
        ->get();
        return response()->json($prontuario);
    }
    public function atualizarProntuarios(Request $request,$id)
    {
        $messages = [
            'dataDoProcedimento.required' => 'Data Do Procedimento é um campo obrigatório',
            'dataDoProcedimento.date' => 'Data Do Procedimento só é permitido caracteres do tipo data',
            'numeracaoDoDente.required' => 'Númeração do dente é um campo obrigatório',
            'numeracaoDoDente.integer' => 'Númeração do dente só é permitidos caracteres do tipo número',
            
        ];
        $this->validate($request,[
            'dataDoProcedimento' => 'required|date',
            'numeracaoDoDente' => 'required|integer',
        ],$messages);
        $registros =  $request->all();
        Prontuario::find($id)->update($registros);
        return response()->json("Atualizado com sucesso!");
    }
    public function deletarProntuarios($id)
    {
        $prontuarios = Prontuario::find($id);
        $del = $prontuarios->delete();
        return response()->json("Deletado com sucesso!");
    }
    public function pesquisarProntuarios(Request $request)
    {
        $filtro = $request->get('nome');
        $prontuarios = DB::table('prontuarios')
        ->join('consultas','prontuarios.Consulta_idConsulta','=','consultas.id')
        ->join('clientes','consultas.Cliente_idCliente','=','clientes.id')
        ->join('pessoas','clientes.Pessoa_idPessoa','=','pessoas.id')
        ->join('dentistas','Dentista_idDentista','=','dentistas.id')
        ->select('dentistas.*','consultas.*','pessoas.*','prontuarios.*')
        ->where('pessoas.nome', 'LIKE','%'.$filtro.'%')
        ->get();
        return response($prontuarios);

    }
}
