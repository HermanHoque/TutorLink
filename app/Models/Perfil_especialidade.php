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

    public function solicitacao()
    {
        // um para muitos
        return $this->hasMany(Solicitacao::class, 'id_perfil_especialidade', 'id');
    }

    public function pf_especialidade_aluno()
    {
        // um para muitos
        return $this->hasMany(Pf_especialidade_aluno::class, 'id_pf_especialidade', 'id');
    }
}
