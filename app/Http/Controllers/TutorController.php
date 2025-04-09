<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Perfil_especialidade;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function perfil()
    {
        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->first();
        $especialidades = Especialidade::all();
        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_Especialidade::with('especialidade')->where('id_tutor', $tutor['id'])->get();
        
        /* foreach ($perfil_esps as $perfil_esp) {
            echo "$perfil_esp";
        } */
        
        return view('tutor/perfil', compact('tutor', 'especialidades', 'perfil_esps'));
    }

    public function home()
    {
        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->first();
        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_Especialidade::with('especialidade')->where('id_tutor', $tutor['id'])->get();
        
        /* foreach ($perfil_esps as $perfil_esp) {
            echo "$perfil_esp";
        } */
        
        return view('tutor/home', compact('perfil_esps'));
    }
}
