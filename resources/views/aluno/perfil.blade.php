@extends('aluno/layout')

@section('layout_user')
    <div id="cabecalho">
        <div class="row" id="title">
            <div class="col" style="font-size: 20pt">
                <i class="bi bi-person"></i>
                <strong>Perfil</strong>
            </div>
        </div>
            <hr id="tracoHeader">   
    </div>

<div class="container mt-4">
    <div class="row">
        <div class="col" style="margin-top: 5px;">
            <div id="cardPerfil">
                <div class="info_user">
                    <div class="d-flex align-items-center">
                        @empty($aluno->foto_aluno){{-- foto --}}
                            <img src="{{ asset('img/school_16658380.png') }}" alt="Foto de perfil" class="perfil_foto" style="width: 50px; height: 50px;">
                        @else
                            <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                        @endempty
                        <div>
                            <h4 style="margin: 0px;">{{$aluno['nome_aluno']}}</h4>
                            <span class="" style="font-size: 10pt; font-family: monospace; margin: 0px; padding-left: 5px;">
                                *Aluno*
                            </span>
                        </div>
                         <!-- Botão "Editar perfil" no lado direito -->
                         <div class="ms-auto">
                            <button class="btn btn-sm rounded-circle" style="background-color: #157347; color: white">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <p style="color: #007bff;">
                        <i class="bi bi-telephone"> -</i> {{$aluno['telefone_aluno']}}
                    </p>
                    <p style="color: #007bff;">
                        <i class="bi bi-mortarboard"> -</i> {{$aluno['nivel_academico']}}
                    </p>
                    <p style="color: #007bff;">
                        <i class="bi bi-file-text"> -</i> Sobre você:
                        {{Str::limit($aluno['descricao'], 40)}}
                    </p>
                    <div class="estatos">
                        <div style="width: 200px;">
                            <strong style="padding-left: 15px;">3</strong>
                            <p>Aulas</p>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>

        <div class="col" style="margin-top: 5px;">
            <div id="cardPerfil">
                <div class="info_user">
                    <div class="d-flex align-items-center">
                        <div>
                            <h4>Solicitações em espera</h4>
                        </div>
                         <!-- Botão "ver solicitações" no lado direito -->
                         <div class="ms-auto">
                            <button class="btn btn-sm rounded-circle" style="background-color: #157347; color: white">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center" style="font-size: 20pt;">
                        <strong><i class="bi bi-bell"></i> - 4</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
        {{-- segundo cabeçalho --}}
        <div id="cabecalho">
            <div class="row" id="title">
                <div class="col" style="font-size: 20pt">
                    <i class="bi bi-book-half"></i> 
                    <strong>Suas aulas</strong>
                </div>
            </div>
                <hr id="tracoHeader">   
        </div>

        <div class="row align-items-center">
            @for ($i = 1; $i <= 3; $i++)
            <div class="col" style="padding-top: 20px">
                <div class="container">
                  <div class="card shadow-sm p-3">
                        <div id="card-body">
                            <div class="">
                                <div>{{-- info tutor --}}
                                    <h5 class="mb-0"><strong>Progamação WEB</strong></h5>
                                    <hr>
                                </div>
                            </div>
                            {{-- sobre a aula --}}
                            <strong>Tutor:</strong>  Eren Yeger <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Telefone:</strong> 934 999 888 <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Tipo de aula:</strong> Particular <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Custo:</strong> 0 <br>
                            <div style="padding-bottom: 5px"></div>
                            <p class="text-muted small"> é o processo de desenvolvimento de sites e aplicações acessíveis por meio de navegadores. Ela envolve tecnologias como HTML (estrutura da página), CSS (estilização) e JavaScript (interatividade). No backend, linguagens como PHP, Python, Node.js e Ruby são usadas para processar dados e gerenciar bancos de dados.</p>
                        </div>
                    
                        <div class="card-footer d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary w-50">Avaliar</a>
                            <a href="#" class="btn btn-danger w-50">Terminar</a>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>


@endsection