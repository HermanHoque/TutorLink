<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable =[
        "nome_tutor",
        "endereco",
        "telefone_tutor",
        "whatsapp",
        "nivel_academico",
        "descricao",
        "estado",
        "foto_tutor",
        "id_user"
    ];
    
    protected $table = "tutor";

    public function perfil_especialidade()
    {
        // um para muitos
        return $this->hasMany(Perfil_especialidade::class, 'id_tutor', 'id');
    }
}
