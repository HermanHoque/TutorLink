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

    <div id="cardPerfil">
        <div class="sessao_perfil">
            <img src="{{ asset('img/goj4.jpg') }}" alt="Foto de perfil" class="perfil_foto">
            <div class="op_user">
                <button class="btn btn-sm" style="background-color: #157347; color: white">
                    <i class="bi bi-pencil-square"></i> Editar perfil
                </button>
            </div>
        </div>
        <div class="info_user">
            <h4>Satoru Gojo</h4>
            <hr>
            <p style="color: #007bff;">
                <i class="bi bi-telephone"> -</i> 934 816 063
            </p>

            <p style="color: #007bff;">
                <i class="bi bi-mortarboard"> -</i> Ensino médio
            </p>

            <p style="color: #007bff;">
                <i class="bi bi-file-text"> -</i> Sobre você: Satoru Gojo é um dos personagens mais populares de Jujutsu Kaisen. Ele é um feiticeiro de jujutsu extremamente poderoso...
            </p>
            <div class="estatos">
                <div style="width: 200px;">
                    <strong style="padding-left: 15px;">3</strong>
                    <p>Aulas</p>
                </div>
               
            </div>
        </div>
    </div>
    <br>
    <div>
        <h3><strong>Suas Aulas</strong></h3>
        <hr>

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