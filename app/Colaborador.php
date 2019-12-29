<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $fillable = [
        "Pessoa_idPessoa",
        "PIS",
        "cargo",
        "conta",
        "tipoDaConta",
        "agencia",
        "salario",
        "dataDeAdmissao"
    ];
}
