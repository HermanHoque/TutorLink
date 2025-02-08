<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */


Route::view("/", "index")->name("index");

/* rotas para cadastrar os usuários */
Route::view("cadastro_de_Tutor", "cadastro/cadastroTutor")->name("cadastroTutor");
Route::view("cadastro_de_Aluno", "cadastro/cadastroAluno")->name("cadastroAluno");
