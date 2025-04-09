@extends('aluno/layout')

@section('layout_user')
<div id="cabecalho">
    <div class="row" id="title">
        <div class="col" style="font-size: 20pt">
            <i class="bi bi-info-circle"></i>
            <strong>Detalhes</strong>
        </div>
    </div>
    <hr id="tracoHeader">   
  </div>
  <div class="row">
      <div class="col-md-6">
          <div id="cardPerfil">
            <div class="sessao_perfil">
                <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                <div class="op_user">
                    <button class="btn btn-sm" style="background-color: #157347; color: white">
                        <i class="bi bi-whatsapp"></i> WhatsApp
                    </button>
                </div>
            </div>
            <div class="info_user">
                <h4>{{$tutor->nome_tutor}}</h4>
                <hr>
                        <p style="color: #007bff;">
                            <i class="bi bi-mortarboard"> -</i> {{$tutor->nivel_academico}}
                        </p>
                        <p style="color: #007bff;">
                            <i class="fa-brands fa-whatsapp"> -</i> {{$tutor->whatsapp}}
                        </p>
                        <p style="color: #007bff;">
                            <i class="bi bi-telephone"> -</i> {{$tutor->telefone_tutor}}
                        </p>
                        <p style="color: #007bff;">
                            <i class="bi bi-geo-alt"> -</i> {{$tutor->endereco}}
                        </p>
            </div>
          </div>
      </div>


      <div class="col-md-6">
          <div id="cardPerfil">
            <div class="info_user">
                <h4>
                    <div>
                    <i class="bi bi-file-text"> -</i> Sobre o Tutor 
                    </div>
                </h4>
                <hr>
                <p style="color: #007bff;">
                    {{-- Str:limit limita o número de caracteres --}}
                    {{ Str::limit($tutor->descricao, 50) }}
                </p>
            </div>
          </div>
      </div>


  </div>
 
  <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            
        </div>

    </div>
    {{-- perfis de especialidades --}}
    <br>
     {{-- segundo cabeçalho --}}
     <div id="cabecalho">
        <div class="row" id="title">
            <div class="col" style="font-size: 20pt">
                <i class="bi bi-easel"></i> 
                <strong>Seus perfis</strong>
            </div>
        </div>
            <hr id="tracoHeader">   
    </div>

        <div class="row align-items-center">
            @empty($perfil_esps->count())
        
            <div class="text-center">
                <img src="{{ asset('img/ask_11049522.png') }}" style="width: 200px; height: 200px;" alt="vazio"><br>
                <span><strong>Não há perfis para mostrar no momento!</strong></span>
            </div>

            @else
            @foreach ( $perfil_esps as $perfil_esp)
            <div class="col" style="padding-top: 20px">
                <div class="container">
                  <div class="card shadow-sm p-3">
                        <div id="card-body">
                            <div class="">
                                <div>{{-- info tutor --}}
                                    <h5 class="mb-0"><strong>{{$perfil_esp->especialidade->nome}}</strong></h5>
                                    <hr>
                                </div>
                            </div>
                            {{-- sobre a aula --}}
                            <strong>Tipo de aula:</strong> 
                            @if ($perfil_esp->tipo == 1)
                                Coletiva
                            @else
                                Particular
                            @endif 
                             <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Nº de alunos:</strong> {{$perfil_esp->num_aluno}} <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Custo:</strong> {{$perfil_esp->custo}} Kz<br>
                            <div style="padding-bottom: 5px"></div>
                            <p class="text-muted small"> 
                                {{$perfil_esp->descricao}}.</p>
                        </div> 
                    
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-outline-secondary w-100">
                                <i class="bi bi-bell"></i>
                                Solicitar Aula
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
        @endempty
    </div>

</div>
@endsection