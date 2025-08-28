<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{

    protected $fillable =[
        "clareza",
        "dominio",
        "interatividade",
        "organização",
        "comentario",
        "id_tutor",
        "id_aluno"
    ];

    protected $table = "avaliacao";

    public function tutor()
    {
        // muitos para um
        return $this->belongsTo(Tutor::class, 'id_tutor');
    }
}
