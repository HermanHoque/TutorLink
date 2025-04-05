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


/* outras rotas do user Tutor*/
Route::middleware(['checkAuth'])->group(function () {
    Route::get('home_tutor', [TutorController::class, 'home'])->name('tutorHome');
    Route::view("perfil_tutor", "tutor/perfil")->name("tutorPerfil");
    Route::get('perfil_tutor', [TutorController::class, 'perfil'])->name('tutorPerfil');
    Route::view("notificação_tutor", "tutor/notificacao")->name("tutorNotifi");
    Route::view("mensagens_tutor", "tutor/msg")->name("tutorMsg");
    Route::post('perfil_specialty', [EspecialidadeController::class, 'perfil_specialty'])->name('perfilSpecialty'); 
});

/* outras rotas do user Aluno*/
Route::middleware(['checkAuth'])->group(function () {
    Route::view("home_aluno", "aluno/home")->name("alunoHome");
    Route::get('perfil_aluno', [AlunoController::class, 'perfil'])->name('alunoPerfil');
    Route::view("notificação_aluno", "aluno/notificacao")->name("alunoNotifi");
    Route::view("mensagens_aluno", "aluno/msg")->name("alunoMsg");
    Route::view('detalhes', 'aluno/detalhes')->name("detalhes");
        
});

