<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Perfil_especialidade;
use App\Models\Pf_especialidade_aluno;
use App\Models\Solicitacao;
use App\Models\Tutor;
use App\Models\Tutor_especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AlunoController extends Controller
{

    /* metodo para pagina de perfil */
    public function perfil()
    {

        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->first();

        $solicitacoes = Solicitacao::with('tutor.perfil_especialidade.especialidade')
        ->where('id_aluno', $aluno['id'])
        ->where('resposta_tutor', 'em espera')
        ->orderBy('created_at', 'desc')
        ->get();

        $perfil_esps = Pf_especialidade_aluno::with('aluno')
        ->with(['perfil_especialidade' => function ($query) {
            $query->with('especialidade') 
            ->with('tutor')
            ->withCount('pf_especialidade_aluno');//contar quantos alunos tem um perfil esp...
        }])
        ->where('id_aluno', $aluno['id']) 
        ->paginate(3);
        
        return view('aluno/perfil', compact('aluno', 'solicitacoes', 'perfil_esps'));
    }


    /* metodo para pagina home */
    public function home()
    {
        
        $tutor_esp = Tutor::with('especialidade')
        ->where('estado', 'on')->paginate(6);

        //echo var_dump($tutor_esp);
        return view('aluno/home', compact('tutor_esp'));
    }


    /* metodo para pesquisar na  pagina home */
    public function homeSearch(Request $request)
    {
        $search = $request->input('search'); // os valores da pesquisa

        $filtros = $request->input('filtros');  // array de filtros selecionados

        if (empty($filtros)) {
            // Se nenhum filtro for selecionado, considerar todos os filtros
            $filtros = ['nome', 'endereco', 'especialidade'];
        }

        $tutor_esp = Tutor::with('especialidade')
            ->where('estado', 'on')
            ->when($search, function ($query, $search) use ($filtros) {
                $query->where(function ($q) use ($search, $filtros) {
                    
                    // filtro por nome do tutor
                    if (in_array('nome', $filtros)) {
                        $q->orWhere('nome_tutor', 'LIKE', "%{$search}%");
                    }

                    // filtro por endereço do tutor
                    if (in_array('endereco', $filtros)) {
                        $q->orWhere('endereco', 'LIKE', "%{$search}%");
                    }

                    // filtro por especialidade
                    if (in_array('especialidade', $filtros)) {
                        $q->orWhereHas('especialidade', function ($q2) use ($search) {
                            $q2->where('nome', 'LIKE', "%{$search}%");
                        });
                    }
                });
            })->paginate(6);

        //echo var_dump($tutor_esp);

        return view('aluno/home', compact('tutor_esp', 'search', 'filtros'));
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
        ->paginate(3);

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

    //metodo para editar o perfil do aluno
    public function editPerfilAluno(Request $rqt) {
        $id = Auth::id();
        $aluno = Aluno::where('id_user', $id)->first();

        $aluno->nome_aluno = $rqt->input('nome_aluno');
        $aluno->telefone_aluno = $rqt->input('telefone');
        $aluno->nivel_academico = $rqt->input('nivel_acad');
        $aluno->descricao = $rqt->input('descricao');

        $aluno->save();

        return redirect()->route('alunoPerfil')->with('notif', 'Perfil atualizado com sucesso!');
        
    }

    //metodo para editar a foto do perfil do aluno
    public function editFotoAluno(Request $rqt) {

       $aluno = Aluno::where('id_user', Auth::id())->firstOrFail();

        if (!$rqt->hasFile('foto_aluno')) {
            return redirect()->route('alunoPerfil')
                ->with('notif', 'Nenhuma foto foi selecionada.');
        }

        $foto = $rqt->file('foto_aluno');

        // Gera nome único para a foto
        $nomeFoto = uniqid() . '_' . preg_replace('/\s+/', '_', strtolower($foto->getClientOriginalName()));

        // Armazena a foto na pasta configurada
        $foto->storeAs('fotosImgs', $nomeFoto, 'public');

        // Deleta a foto antiga, se não for a padrão
        if ($aluno->foto_aluno && $aluno->foto_aluno !== 'school_16658380.png') {
            Storage::disk('public')->delete('fotosImgs/' . $aluno->foto_aluno);
        }

        // Atualiza no banco
        $aluno->update(['foto_aluno' => $nomeFoto]);

        return redirect()->route('alunoPerfil')
            ->with('notif', 'Foto de perfil atualizada com sucesso!');
    }
}
