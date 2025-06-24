<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{

    protected $fillable =[
        "resposta_tutor",
        "estado_aluno",
        "id_perfil_especialidade",
        "id_tutor",
        "id_aluno"
    ];
    protected $table = "solicitacao";
    
    public function aluno()
    {
        //muitos para um
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function tutor()
    {
        //muitos para um
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }

    public function perfil_especialidade()
    {
        //muitos para um
        return $this->belongsTo(Perfil_especialidade::class, 'id_perfil_especialidade');
    }
}
