<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Perfil_especialidade;
use App\Models\Pf_especialidade_aluno;
use App\Models\Solicitacao;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function perfil()
    {
        /* metodo para pagina de perfil */
        
        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->first();
        $especialidades = Especialidade::all();

        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_especialidade::with('especialidade', 'tutor')
        ->withCount('pf_especialidade_aluno') // conta os alunos ligados a esse perfil
        ->where('id_tutor', $tutor['id'])     // filtra pelo tutor específico
        ->get();
        
        return view('tutor/perfil', compact('tutor', 'especialidades', 'perfil_esps'));
    }

    public function home()
    {
        /* metodo para pagina home */

        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->first();
        
        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_especialidade::with('especialidade', 'tutor')
        ->withCount('pf_especialidade_aluno') // conta os alunos ligados a esse perfil
        ->where('id_tutor', $tutor['id'])     // filtra pelo tutor específico
        ->get();
        
        return view('tutor/home', compact('perfil_esps'));
    }

    public function notificacao()
    {
        /* metodo para pagina de notificação */

        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_tutor', $tutor)
        ->where('resposta_tutor', 'em espera')
        ->orderBy('created_at', 'desc') // ordena do mais recente para o mais antigo
        ->get();
        $pag = 'naoAceite';

        return view('tutor/notificacao', compact('solicitacoes', 'pag'));
        
    }

    public function notificacaoAceite()
    {
        /* metodo para pagina de notificaçãoAceite */
        
        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_tutor', $tutor)
        ->where('resposta_tutor', 'aceite')
        ->orderBy('created_at', 'desc') // ordena do mais recente para o mais antigo
        ->get();
        $pag = 'aceite';

        return view('tutor/notificacao', compact('solicitacoes', 'pag'));
        
    }

    public function respostaSolici(Request $rqt)
    {
        /* metodo para responder solicitações */
        
        $id = $rqt->input('id_solici');
        $id_aluno = $rqt->input('id_aluno');
        $id_pf_especialidade = $rqt->input('id_pf_especialidade');
        $resposta = $rqt->input('rp');

        //atualizar a resposta do tutor
        if ($resposta == 'aceite') {

            $solicitacao = Solicitacao::find($id);
            $solicitacao->resposta_tutor = 'aceite';
            $solicitacao->save();

            //criar a relação do aluno e o perfil esp...
            Pf_especialidade_aluno::create(['id_pf_especialidade'=>$id_pf_especialidade, 'id_aluno'=>$id_aluno]);

        } elseif ($resposta == 'recusada') {

            $solicitacao = Solicitacao::find($id);
            $solicitacao->resposta_tutor = 'recusada';
            $solicitacao->save();
        } 

        return redirect()->route('tutorNotifi')->with('notif', 'Resposta enviada ao aluno com sucesso!');       
        
    }


    public function deleteNotifi(Request $rqt)
    {
        $id = $rqt->input('id_solici');
        $solicitacao = Solicitacao::find($id);
        $solicitacao->delete();
        return redirect()->route('tutorNotifiAceite')->with('notif', 'Notificação excluida com sucesso!');
    }






}
