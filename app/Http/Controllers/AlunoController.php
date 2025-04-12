<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Perfil_especialidade;
use App\Models\Solicitacao;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function perfil()
    {

        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->first();

        $solicitacoes = Solicitacao::with('tutor')->where('id_aluno', $aluno['id'])->where('resposta_tutor', 'em espera')->get();
        //echo var_dump($solicitacao);
        return view('aluno/perfil', compact('aluno', 'solicitacoes'));
    }


    public function home()
    {
        
        $tutores = Tutor::where('estado', 'on')->get();
        //echo var_dump($tutores);
        return view('aluno/home', compact('tutores'));
    }

    public function detalhes($uuid)
    {

        $id = Auth::id();
        $id_aluno = Aluno::where('id_user', $id)->value('id');
        $tutor = Tutor::where('uuid_tutor', $uuid)->first();
        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_especialidade::with('especialidade')->where('id_tutor', $tutor['id'])->get();
        //echo var_dump($aluno);
        return view('aluno/detalhes', compact('tutor', 'id_aluno', 'perfil_esps'));
    }

    public function solicitacao(Request $rqt)
    {

        
        $solicitacao_data = $rqt->all();
        $uuid = $rqt->input('uuid_tutor');

        Solicitacao::create($solicitacao_data);
        return redirect()->route('detalhes', [$uuid])->with('notif', 'Solicitação enviada com sucesso! Aguarde a resposta do tutor.');
    }
}
