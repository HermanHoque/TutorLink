<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutor_especialidade extends Model
{
     protected $fillable =[
        "id_tutor",
        "id_especialidade"
    ];
    protected $table = "tutor_especialidade";

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
