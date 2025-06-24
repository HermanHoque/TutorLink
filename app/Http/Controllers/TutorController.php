<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Perfil_especialidade;
use App\Models\Pf_especialidade_aluno;
use App\Models\Solicitacao;
use App\Models\Tutor;
use App\Models\Tutor_especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /* metodo para pagina de perfil */
    public function perfil()
    {
        
        $id = Auth::id();
        $tutor = Tutor::where('id_user', $id)->first();
        //$especialidades = Especialidade::all();

        $tutor_esp = Tutor_especialidade::with('tutor', 'especialidade')
        ->where('id_tutor', $tutor['id'])->get();

        //pegar perfis de especialidades de um tutor
        $perfil_esps = Perfil_especialidade::with('especialidade', 'tutor')
        ->withCount('pf_especialidade_aluno') // conta os alunos ligados a um perfil
        ->where('id_tutor', $tutor['id'])     // filtra pelo tutor específico
        ->paginate(3);
        
        return view('tutor/perfil', compact('tutor', 'tutor_esp', 'perfil_esps'));
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
        ->paginate(3);
        
        return view('tutor/home', compact('perfil_esps'));
    }

    /* metodo para pagina de notificação não lida*/
    public function notificacao()
    {

        $id = Auth::id();
        $id_tutor = Tutor::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_tutor', $id_tutor)
        ->where('resposta_tutor', 'em espera')
        ->where('estado_tutor', 'não lida')
        ->orderBy('created_at', 'desc') // ordena do mais recente para o mais antigo
        ->get();
        $pag = 'naoAceite';

        return view('tutor/notificacao', compact('solicitacoes', 'pag', 'id_tutor'));
        
    }


    /* metodo para pagina de notificações Aceites */
    public function notificacaoAceite()
    {
        
        $id = Auth::id();
        $id_tutor = Tutor::where('id_user', $id)->value('id');

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->with('aluno')
        ->where('id_tutor', $id_tutor)
        ->where('resposta_tutor', 'aceite')
        ->where('estado_tutor', 'lida')
        ->orderBy('created_at', 'desc') // ordena do mais recente para o mais antigo
        ->get();
        $pag = 'aceite';

        return view('tutor/notificacao', compact('solicitacoes', 'pag', 'id_tutor'));
        
    }

    /* metodo para responder solicitações */
    public function respostaSolici(Request $rqt)
    {
        
        $id = $rqt->input('id_solici');
        $id_aluno = $rqt->input('id_aluno');
        $id_pf_especialidade = $rqt->input('id_pf_especialidade');
        $resposta = $rqt->input('rp');

        //atualizar a resposta do tutor
        if ($resposta == 'aceite') {

            $solicitacao = Solicitacao::find($id);
            $solicitacao->resposta_tutor = 'aceite';
            $solicitacao->estado_tutor = 'lida';
            $solicitacao->save();

            //criar a relação do aluno e o perfil esp...
            Pf_especialidade_aluno::create(['id_pf_especialidade'=>$id_pf_especialidade, 'id_aluno'=>$id_aluno]);

        } elseif ($resposta == 'recusada') {

            $solicitacao = Solicitacao::find($id);
            $solicitacao->resposta_tutor = 'recusada';
            $solicitacao->estado_tutor = 'deletado';
            $solicitacao->save();
        } 

        return redirect()->route('tutorNotifi')->with('notif', 'Resposta enviada ao aluno com sucesso!');       
        
    }


    public function deleteNotifi(Request $rqt)
    {
        $id = $rqt->input('id_solici');
        $solicitacao = Solicitacao::find($id);
        $solicitacao->estado_tutor = 'deletado';
        $solicitacao->save();
        /* $solicitacao->delete(); */
        return redirect()->route('tutorNotifiAceite')->with('notif', 'Notificação excluida com sucesso!');
    }






}
