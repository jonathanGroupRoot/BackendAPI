<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'dadaDeCadastro','tipoDeAtendimento','Procedimento_idProcedimento','Colaborador_idColaborador','Cliente_idCliente'
    ];
}
