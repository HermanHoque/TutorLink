<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat_msg extends Model
{

    protected $fillable =[
        "msg",
        "estado",
        "id_remetente",
        "id_destinatario"
    ];
    
    protected $table = "chat_msg";
}
