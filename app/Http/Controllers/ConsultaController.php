<?php
use Illuminate\Http\Request;
use App\Consulta;

namespace App\Http\Controllers;

class ConsultaController extends Controller
{
    public function listarConsultas()
    {
        return response()->json(Consulta::all());
    }
    public function cadastrarConsultas(Request $request)
    {
        $consulta = new Consulta();
        

    }
  
}
