<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{

    protected $fillable =[
        "nome",
        "descricao"
    ];
    protected $table = "especialidade";

    public function perfil_especialidade()
    {
        // um para muitos
        return $this->hasMany(Perfil_especialidade::class, 'id_especialidade', 'id');
    }

    public function tutor_esp()
    {
        // um para muitos
        return $this->hasMany(Tutor_especialidade::class, 'id_especialidade', 'id');
    }

    public function tutor()
    {
        return $this->belongsToMany(Tutor::class, 'tutor_especialidade', 'id_tutor', 'id_especialidade');
    }
}
