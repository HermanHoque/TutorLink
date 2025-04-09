<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Perfil_especialidade;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function perfil()
    {

        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->first();
        return view('aluno/perfil', compact('aluno'));
    }


    public function home()
    {

        $tutores = Tutor::where('estado', 'on')->get();
        //echo var_dump($tutores);
        return view('aluno/home', compact('tutores'));
    }

    public function detalhes(Request $rqt)
    {
        $id_tutor = $rqt->only('id_tutor');
        $tutor = Tutor::where('id', $id_tutor)->first();
        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_especialidade::with('especialidade')->where('id_tutor', $id_tutor)->get();
        //echo var_dump($tutor);
        return view('aluno/detalhes', compact('tutor', 'perfil_esps'));
    }
}
