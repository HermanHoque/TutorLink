<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Perfil_especialidade;
use App\Models\Pf_especialidade_aluno;
use App\Models\Solicitacao;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function perfil()
    {
        /* metodo para pagina de perfil */

        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->first();

        $solicitacoes = Solicitacao::with('tutor')
        ->where('id_aluno', $aluno['id'])->where('resposta_tutor', 'em espera')->get();

        $perfil_esps = Pf_especialidade_aluno::with('aluno')
        ->with(['perfil_especialidade' => function ($query) {
            $query->with('especialidade')
            ->with('tutor')
            ->withCount('pf_especialidade_aluno');//contar quantos alunos tem um perfil esp...
        }])
        ->where('id_aluno', $aluno['id']) 
        ->get();
        
        return view('aluno/perfil', compact('aluno', 'solicitacoes', 'perfil_esps'));
    }


    public function home()
    {
        /* metodo para pagina home */
        
        $tutores = Tutor::where('estado', 'on')->get();
        //echo var_dump($tutores);
        return view('aluno/home', compact('tutores'));
    }

    public function detalhes($uuid)
    {
        /* metodo para ver detalhes de um tutor */

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
        //metodo para enviar solicitação

        $solicitacao_data = $rqt->all();
        $uuid = $rqt->input('uuid_tutor');

        Solicitacao::create($solicitacao_data);
        return redirect()->route('detalhes', [$uuid])->with('notif', 'Solicitação enviada com sucesso! Aguarde a resposta do tutor.');
    }

    public function notificacao()
    {
        /* metodo para notificação */

        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_aluno', $aluno)
        ->where(function ($query) {
            $query->where('resposta_tutor', 'aceite')
                ->orWhere('resposta_tutor', 'recusada');
        })
        ->where('estado_aluno', 'não lida')
        ->orderBy('updated_at', 'desc')
        ->get();

        
        $pag = 'naoLida';

        return view('aluno/notificacao', compact('solicitacoes', 'pag'));
        
    }

    public function notificacaoLida()
    {
        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_aluno', $aluno)
        ->where('estado_aluno', 'lida')
        ->orderBy('updated_at', 'desc') // ordena do mais recente para o mais antigo
        ->get();

        $pag = 'lida';

        return view('aluno/notificacao', compact('solicitacoes', 'pag'));
    }


    public function confirmNotifi(Request $rqt)
    {
         /* metodo para confirmar do aluno solicitações */
        
         $id = $rqt->input('id_solici');
         $op = $rqt->input('op');
 
         //atualizar o estado do aluno
         if ($op == 'ok') {
 
             $solicitacao = Solicitacao::find($id);
             $solicitacao->estado_aluno = 'lida';
             $solicitacao->save();
             return redirect()->route('alunoNotifi')->with('notif', 'Notificação marcada como lida!');
 
         } elseif ($op == 'excluir' || $op == 'excluir2') {//excluir solicitação
 
             $solicitacao = Solicitacao::find($id);
             $solicitacao->delete();
             if ($op == 'excluir') {
                return redirect()->route('alunoNotifi')->with('notif', 'Notificação excluida com sucesso!');
             } else {
                return redirect()->route('alunoNotifiLida')->with('notif', 'Notificação excluida com sucesso!');
             }
             
         } 
    }
}
