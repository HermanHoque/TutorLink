<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{

    protected $fillable =[
        "estado",
        "id_perfil_especialidade",
        "id_aluno"
    ];
    
    protected $table = "solicitacao";
}
