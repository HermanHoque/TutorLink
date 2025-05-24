<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function userType()
    {
        $id = Auth::id();//id do user autenticado
        $user = User::where('id', $id)->first();

        /* echo var_dump($user['perfil']); */

        if ($user['perfil'] == 'aluno') {
            return redirect()->route('alunoHome');
        } elseif ($user['perfil'] == 'tutor') {
            return redirect()->route('tutorHome');
        }
        
    }
    
    public function login(Request $rqt)
    {
        $credenciais = $rqt->only('email', 'password');//credenciais 

        /* autenticar o usuário e verificar os dados na bd*/
        if (Auth::attempt($credenciais)) {
            $rqt->session()->regenerate();
            return redirect()->intended('user_type');
        }else {
            return redirect()->back()->with('erro',' Email ou Password inválida!');
        } 
        /* echo var_dump($credenciais); */
    }


    public function logout(Request $rqt)
    {
        Auth::logoutCurrentDevice(); // Encerra sessão apenas no dispositivo atual
    
        // Para encerrar todas as sessões do usuário:
        // Auth::logoutOtherDevices($currentPassword);
        
        $rqt->session()->invalidate();
        $rqt->session()->regenerateToken();
    
        return redirect()->route('loginPage');
    }


    public function deleteAll(Request $rqt)
    {
        $perfil = $rqt->input('perfil');
        $pag = $rqt->input('pag');
        $id = $rqt->input('id');

        if ($perfil == "tutor") {
            
            if ($pag == "aceite") {
                Solicitacao::query()->where('id_tutor', $id)
                ->where('resposta_tutor', 'aceite')
                ->update(['estado_tutor' => 'deletado']);
                return redirect()->route('tutorNotifiAceite')->with('notif', 'Notificação excluida com sucesso!');
            } else {
                Solicitacao::query()->where('id_tutor', $id)
                ->where('resposta_tutor', 'em espera')
                ->update(
                    ['resposta_tutor' => 'recusada'],
                    ['estado_tutor' => 'deletado']
                );
                return redirect()->route('tutorNotifi')->with('notif', 'Notificação excluida com sucesso!');
            }
            
        } elseif ($perfil == "aluno") {
            if ($pag == "lida") {
                Solicitacao::query()->where('id_aluno', $id)
                ->where('estado_aluno', 'lida')
                ->update(['estado_aluno' => 'deletado']);
                return redirect()->route('alunoNotifiLida')->with('notif', 'Notificação excluida com sucesso!');
            } else {
                Solicitacao::query()->where('id_aluno', $id)
                ->where('estado_aluno', 'não lida')
                ->update(['estado_aluno' => 'deletado']);
                return redirect()->route('alunoNotifi')->with('notif', 'Notificação excluida com sucesso!');
            }
        } 

        /* $solicitacao->delete(); */
    }

   
}
