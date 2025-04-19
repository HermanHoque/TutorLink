<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pf_especialidade_aluno extends Model
{
    protected $fillable =[
        "id_pf_especialidade",
        "id_aluno"
    ];
    protected $table = "pf_especialidade_aluno";


    public function aluno()
    {
        //muitos para um
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function perfil_especialidade()
    {
        //muitos para um...
        return $this->belongsTo(Perfil_especialidade::class, 'id_pf_especialidade');
    }
}
