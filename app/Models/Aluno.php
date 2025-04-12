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
    
    protected $table = "aluno";
}
