<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\TutorController;

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::view("/", "index")->name("index");

/* rotas para cadastrar os usuários */
Route::view("cadastro_de_Tutor", "cadastro/cadastroTutor")->name("cadastroTutor");
Route::view("cadastro_de_Aluno", "cadastro/cadastroAluno")->name("cadastroAluno");

/* rota para login de usuário */
Route::view("TutorLink_Entrar", "login/login")->name("loginPage");
/* rota de criação de sessão */
Route::post('login', [UserController::class, 'login'])->name('login');
/* terminar sessão */
Route::get('logout', [UserController::class, 'logout'])->name('logout');
/* rota para o tipo de usuário */
Route::get('user_type', [UserController::class, 'userType'])->name('userType');

/*rotas comuns*/
Route::middleware(['checkAuth'])->group(function () {
    Route::delete('delete_All', [UserController::class, 'deleteAll'])->name('deleteAll');
    
});


/* outras rotas do user Tutor*/
Route::middleware(['checkAuth'])->group(function () {
    Route::get('home_tutor', [TutorController::class, 'home'])->name('tutorHome');
    Route::get('perfil_tutor', [TutorController::class, 'perfil'])->name('tutorPerfil');
    Route::get('notificação_tutor', [TutorController::class, 'notificacao'])->name('tutorNotifi');
    Route::delete('deleteNotificação_tutor', [TutorController::class, 'deleteNotifi'])->name('deleteNotifi');
    Route::get('notificaçãoAceite_tutor', [TutorController::class, 'notificacaoAceite'])->name('tutorNotifiAceite');
    Route::view("mensagens_tutor", "tutor/msg")->name("tutorMsg");
    Route::post('resposta', [TutorController::class, 'respostaSolici'])->name('resposta');
    Route::post('perfil_specialty', [EspecialidadeController::class, 'perfil_specialty'])->name('perfilSpecialty'); 
});

/* outras rotas do user Aluno*/
Route::middleware(['checkAuth'])->group(function () {
    Route::get('home_aluno', [AlunoController::class, 'home'])->name('alunoHome');
    Route::get('perfil_aluno', [AlunoController::class, 'perfil'])->name('alunoPerfil');
    Route::match(['post', 'get'],'detalhes/{uuid}', [AlunoController::class, 'detalhes'])->name('detalhes');
    Route::post('solicitar_aluna', [AlunoController::class, 'solicitacao'])->name('solicitacao');
    Route::get('notificação_aluno', [AlunoController::class, 'notificacao'])->name('alunoNotifi');
    Route::get('notificaçãoLida_aluno', [AlunoController::class, 'notificacaoLida'])->name('alunoNotifiLida');
    Route::match(['post', 'delete'], 'confirm_notificação', [AlunoController::class, 'confirmNotifi'])->name('confirmNotifi');
    Route::view("mensagens_aluno", "aluno/msg")->name("alunoMsg");
        
});

