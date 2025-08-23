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
        <!-- card perfil -->
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
                            <span style="font-size: 10pt; font-family: monospace; margin: 0px; padding-left: 5px; color: rgba(0, 0, 0, 0.4);">
                                <em>*Aluno*</em>
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
        <!-- fim card perfil  -->

       <div class="col mt-2">
            <div id="cardPerfil" class="card shadow-sm border-1">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Solicitações em espera</h4>
                        
                        <!-- Botão "ver/ocultar solicitações" alinhado à direita -->
                        <button id="toggleSolicitacoes" class="btn btn-sm rounded-circle ms-2" 
                                style="background-color: #157347; color: white">
                            <i id="iconEye" class="bi bi-eye"></i>
                        </button>
                    </div>
                    <hr>
                    
                    <div class="text-center" style="font-size: 18pt;">
                        <strong><i class="bi bi-bell"></i> - {{$solicitacoes->count()}}</strong>
                    </div>

                    <!-- lista de solicitações (com scroll e inicialmente oculta) -->
                    <div id="listaSolicitacoes" class="solicitacoes mt-3">
                        @foreach ($solicitacoes as $s)
                            <div class="p-2 mb-2 border rounded bg-light text-start">
                                Solicitação de aula de <strong>{{$s->perfil_especialidade->especialidade->nome}}</strong>
                                para <strong>{{$s->tutor->nome_tutor}}</strong>
                                <br>
                                <span class="text-muted small">
                                    <i class="bi bi-clock"></i> {{ $s->created_at->format('d/m/Y \à\s H:i') }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <!-- fim lista de solicitações -->
                </div>
            </div>
        </div>
        <!-- Fim Card Solicitações -->


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

        <!-- cards aulas -->
        <div class="row align-items-center">
            @empty($perfil_esps->count())
            
                <div class="text-center">
                    <img src="{{ asset('img/ask_11049522.png') }}" style="width: 200px; height: 200px;" alt="vazio"><br>
                    <span><strong>Não há perfis para mostrar no momento!</strong></span>
                </div>

            @else       
            @foreach ($perfil_esps as $p_esp)
            <div class="col" style="padding-top: 20px">
                <div class="container">
                  <div class="card shadow-sm p-3">
                        <div id="card-body">
                            <div class="">
                                <div>{{-- info tutor --}}
                                    <h5 class="mb-0"><strong>{{$p_esp->perfil_especialidade->especialidade->nome}}</strong></h5>
                                    <hr>
                                </div>
                            </div>
                            {{-- sobre a aula --}}
                            <strong>Tutor:</strong>  {{$p_esp->perfil_especialidade->tutor->nome_tutor}} <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Telefone:</strong> {{$p_esp->perfil_especialidade->tutor->telefone_tutor}} <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Tipo de aula:</strong>
                            @if ($p_esp->perfil_especialidade->tipo == 1)
                                Coletiva
                                <br>
                                <div style="padding-bottom: 5px"></div>
                                <strong>Nº de alunos:</strong> {{$p_esp->perfil_especialidade->pf_especialidade_aluno_count}}/{{$p_esp->perfil_especialidade->num_aluno}} <br>
                            @else
                                Particular
                                <br>
                                <div style="padding-bottom: 5px"></div>
                                <strong>Nº de alunos:</strong> {{$p_esp->perfil_especialidade->num_aluno}} <br>
                            @endif 
                            <div style="padding-bottom: 5px"></div>
                            <strong>Custo:</strong> {{$p_esp->perfil_especialidade->custo}} <br>
                            <div style="padding-bottom: 5px"></div>
                            <p class="text-muted small"> {{$p_esp->perfil_especialidade->detalhes}}</p>
                        </div>
                    
                        <div class="card-footer d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary w-50">Avaliar</a>
                            <a href="#" class="btn btn-danger w-50">Terminar</a>
                        </div>
                    </div>
                </div>
        </div>

        @endforeach
        @endempty

        @include('aluno/pagination', ['paginator' => $perfil_esps])
    </div>
    <!-- fim cards aulas -->



    <!-- JS toggle -->
    <script>
        document.getElementById("toggleSolicitacoes").addEventListener("click", function () {
        const lista = document.getElementById("listaSolicitacoes");
        const icon  = document.getElementById("iconEye");

        lista.classList.toggle("show");

        if (lista.classList.contains("show")) {
            icon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            icon.classList.replace("bi-eye-slash", "bi-eye");
        }
        });

    </script>




@endsection