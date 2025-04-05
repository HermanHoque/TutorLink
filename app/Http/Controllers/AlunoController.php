<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
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
}
