<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function booted()
    {
        static::creating(function ($tutor) {
            $tutor->uuid_tutor = Str::uuid();
        });
    }

    public function perfil_especialidade()
    {
        // um para muitos
        return $this->hasMany(Perfil_especialidade::class, 'id_tutor', 'id');
    }

    public function solicitacao()
    {
        // um para muitos
        return $this->hasMany(Solicitacao::class, 'id_tutor', 'id');
    }

    public function tutor_esp()
    {
        // um para muitos
        return $this->hasMany(Tutor_especialidade::class, 'id_especialidade', 'id');
    }
}
