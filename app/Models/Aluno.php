<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
