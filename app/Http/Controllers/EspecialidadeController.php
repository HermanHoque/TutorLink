<?php

namespace App\Http\Controllers;

use App\Models\Perfil_especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function perfil_specialty(Request $rqt)
    {
        $perfil_data = $rqt->all();
        Perfil_especialidade::create($perfil_data);
        return redirect()->route('tutorPerfil')->with('notif', 'Perfil criado com sucesso!');
    }
}
