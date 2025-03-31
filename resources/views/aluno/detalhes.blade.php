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
                <h4>Satoru Gojo</h4>
                <hr>
                        <p style="color: #007bff;">
                            <i class="bi bi-mortarboard"> -</i> Ensino Superior
                        </p>
                        <p style="color: #007bff;">
                            <i class="fa-brands fa-whatsapp"> -</i> 922 655 422
                        </p>
                        <p style="color: #007bff;">
                            <i class="bi bi-telephone"> -</i> 922 655 422
                        </p>
                        <p style="color: #007bff;">
                            <i class="bi bi-geo-alt"> -</i> Cacuaco - Vidrul
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
                    Eren Yeager é o protagonista de Attack on Titan (Shingeki no Kyojin), mas sua jornada é repleta de ambiguidades morais. No início, ele é motivado por um desejo de vingança contra os Titãs após testemunhar a destruição de sua cidade e a morte de sua mãe...
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
                            <strong>Tipo de aula:</strong>  Particular <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Nº de alunos:</strong> 1 <br>
                            <div style="padding-bottom: 5px"></div>
                            <strong>Custo:</strong> 0 <br>
                            <div style="padding-bottom: 5px"></div>
                            <p class="text-muted small"> é o processo de desenvolvimento de sites e aplicações acessíveis por meio de navegadores. Ela envolve tecnologias como HTML (estrutura da página), CSS (estilização) e JavaScript (interatividade). No backend, linguagens como PHP, Python, Node.js e Ruby são usadas para processar dados e gerenciar bancos de dados.</p>
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
        @endfor
    </div>

</div>
@endsection