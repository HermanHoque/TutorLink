<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::view("/", "index")->name("index");

/* rotas para cadastrar os usuários */
Route::view("cadastro_de_Tutor", "cadastro/cadastroTutor")->name("cadastroTutor");
Route::view("cadastro_de_Aluno", "cadastro/cadastroAluno")->name("cadastroAluno");


/* outras rotas do user Tutor*/
Route::view("home_tutor", "tutor/home")->name("tutorHome");
Route::view("perfil_tutor", "tutor/perfil")->name("tutorPerfil");
Route::view("notificação_tutor", "tutor/notificacao")->name("tutorNotifi");
Route::view("mensagens_tutor", "tutor/msg")->name("tutorMsg");

/* outras rotas do user Aluno*/
Route::view("home_aluno", "aluno/home")->name("alunoHome");
Route::view("perfil_aluno", "aluno/perfil")->name("alunoPerfil");
Route::view("notificação_aluno", "aluno/notificacao")->name("alunoNotifi");
Route::view("mensagens_aluno", "aluno/msg")->name("alunoMsg");
