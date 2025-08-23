<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Aluno extends Model
{
    protected $fillable =[
        "nome_aluno",
        "nivel_academico",
        "telefone_aluno",
        "descricao",
        "foto_aluno",
        "id_user",
    ];

    protected $table = "aluno";

    protected static function booted()
    {
        static::creating(function ($aluno) {
            $aluno->uuid_aluno = Str::uuid();
        });
    }

    public function solicitacao()
    {
        // um para muitos
        return $this->hasMany(Solicitacao::class, 'id_aluno', 'id');
    }

    public function pf_especialidade_aluno()
    {
        // um para muitos
        return $this->hasMany(Pf_especialidade_aluno::class, 'id_aluno', 'id');
    }

    public function perfil_especialidade()
    {
        return $this->belongsToMany(Perfil_especialidade::class, 'pf_especialidade_aluno', 'id_aluno', 'id_pf_especialidade');
    }
    
}
