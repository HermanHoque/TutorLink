<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil_especialidade extends Model
{
    protected $fillable =[
        "tipo",
        "custo",
        "num_aluno",
        "descricao",
        "id_especialidade",
        "id_tutor"
    ];
    protected $table = "perfil_especialidade";

    public function tutor()
    {
        //muitos para um
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }

    public function especialidade()
    {
        //muitos para um
        return $this->belongsTo(Especialidade::class, 'id_especialidade');
    }
}
