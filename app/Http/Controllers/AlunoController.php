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

    /* metodo para pagina de perfil */
    public function perfil()
    {

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


    /* metodo para ver detalhes de um tutor */
    public function detalhes($uuid)
    {

        $id = Auth::id();
        $id_aluno = Aluno::where('id_user', $id)->value('id');
        $tutor = Tutor::where('uuid_tutor', $uuid)->first();
        $tutor_id = $tutor['id'];

        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_especialidade::with('especialidade', 'tutor')
        ->withCount('pf_especialidade_aluno') // conta os alunos ligados a esse perfil
        ->where('id_tutor', $tutor['id'])     // filtra pelo tutor específico
        ->get();

        return view('aluno/detalhes', compact('tutor', 'id_aluno', 'perfil_esps'));
    }


    //metodo para enviar solicitação
    public function solicitacao(Request $rqt)
    {

        $solicitacao_data = $rqt->all();
        $uuid = $rqt->input('uuid_tutor');
        $num_aluno = $rqt->input('num_aluno');
        $tipo_aula = $rqt->input('tipo_aula');
        $num = 0;

         /*consulta para verificar se o registo existe */
        $existe = Solicitacao::where('id_perfil_especialidade', $solicitacao_data['id_perfil_especialidade'])
        ->where('id_aluno', $solicitacao_data['id_aluno'])
        ->exists();

        /*consulta para pegar o nº de alunos em um perfil esp... */
        $perfil_esps = Pf_especialidade_aluno::with(['perfil_especialidade' => function ($query) {
            $query->withCount('pf_especialidade_aluno');//contar quantos alunos tem um perfil esp...
        }])
        ->where('id_pf_especialidade', $solicitacao_data['id_perfil_especialidade']) 
        ->get();

        /* guardar o nº de alunos */
        foreach ($perfil_esps as $p) {
            $num = $p->perfil_especialidade->pf_especialidade_aluno_count;
        }

        if ($existe) {
           
            return redirect()->route('detalhes', [$uuid])->with('notif2', 'Você já solicitou esta aula!');

        }else {

            if ($num == $num_aluno && $tipo_aula == 1) {
                return redirect()->route('detalhes', [$uuid])->with('notif2', 'Você não pode solicitar, o perfil já esta cheio.');
            } else {
                Solicitacao::create($solicitacao_data);
                return redirect()->route('detalhes', [$uuid])->with('notif', 'Sua solicitação foi enviada, aguarde a resposta do tutor.');
            }
        }


    }



    /* metodo para notificação */
    public function notificacao()
    {

        $id = Auth::id();
        $id_aluno = Aluno::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_aluno', $id_aluno)
        ->where(function ($query) {
            $query->where('resposta_tutor', 'aceite')
                ->orWhere('resposta_tutor', 'recusada');
        })
        ->where('estado_aluno', 'não lida')
        ->orderBy('updated_at', 'desc')
        ->get();

        
        $pag = 'naoLida';

        return view('aluno/notificacao', compact('solicitacoes', 'pag', 'id_aluno'));
        
    }

    public function notificacaoLida()
    {
        $id = Auth::id();
        $id_aluno = Aluno::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_aluno', $id_aluno)
        ->where('estado_aluno', 'lida')
        ->orderBy('updated_at', 'desc') // ordena do mais recente para o mais antigo
        ->get();

        $pag = 'lida';

        return view('aluno/notificacao', compact('solicitacoes', 'pag', 'id_aluno'));
    }


    /* metodo para atualizar o estado e excluir solicitações do aluno */
    public function confirmNotifi(Request $rqt)
    {
        
         $id = $rqt->input('id_solici');
         $op = $rqt->input('op');
 
         //atualizar o estado do aluno
         if ($op == 'ok') {
 
             $solicitacao = Solicitacao::find($id);
             $solicitacao->estado_aluno = 'lida';
             $solicitacao->save();
             return redirect()->route('alunoNotifi')->with('notif', 'Notificação marcada como lida!');
             
             //excluir solicitação
            } elseif ($op == 'excluir' || $op == 'excluir2') {
 
             $solicitacao = Solicitacao::find($id);
             $solicitacao->estado_aluno = 'deletado';
             $solicitacao->save();
             if ($op == 'excluir') {
                return redirect()->route('alunoNotifi')->with('notif', 'Notificação excluida com sucesso!');
             } else {
                return redirect()->route('alunoNotifiLida')->with('notif', 'Notificação excluida com sucesso!');
             }
             
         } 
    }
}
