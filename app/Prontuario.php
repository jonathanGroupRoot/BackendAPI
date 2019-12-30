<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    protected $fillable = [
        'numeracaoDoDente',
        'dataDoProcedimento',
        'dataDeRetorno',
        'Consulta_idConsulta',
        'Dentista_idDentista',
    ];
}
