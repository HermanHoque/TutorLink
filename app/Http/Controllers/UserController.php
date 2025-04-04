<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $rqt)
    {
        $credenciais = $rqt->only('email', 'password');//credenciais 

        /* autenticar o usuário e verificar os dados na bd*/
        if (Auth::attempt($credenciais)) {
            $rqt->session()->regenerate();
            return redirect()->intended('home_tutor');
        }else {
            return redirect()->back()->with('erro',' Email ou Password inválida!');
        } 
        echo var_dump($credenciais);
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

   
}
