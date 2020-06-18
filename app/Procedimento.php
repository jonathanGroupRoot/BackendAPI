<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $fillable = [
        'tipo',
        'valor',
        'descricao',
    ];
}
