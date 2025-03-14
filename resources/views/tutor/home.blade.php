@extends('tutor/layout')

@section('layout_user')
<div id="cabecalho">
    <div class="row" id="title">
        <div class="col" style="font-size: 20pt">
            <i class="bi bi-house"></i>
            <strong>Home</strong>
        </div>
    </div>
    <hr id="tracoHeader">   

  </div>
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="estilo-card card_1">
                <p class="mb-1">Média de avaliação</p>
                <h2><i class="bi bi-star-fill text-warning"></i> 10/10</h2>
                <div class="wave"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="estilo-card card_2">
                <p class="mb-1">Nº de avaliações</p>
                <h2><i class="bi bi-graph-up"></i> 1,250</h2>
                <div class="wave"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="estilo-card card_3">
                <p class="mb-1">Nº de Alunos</p>
                <h2><i class="bi bi-bar-chart"></i> 10</h2>
                <div class="wave"></div>
            </div>
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
                    
                        <div class="card-footer d-flex gap-2">
                            <a href="#" class="btn btn-outline-secondary w-50">Ver alunos</a>
                            <a href="#" class="btn btn-danger w-50">
                                <i class="bi bi-x-circle"></i> Terminar
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>


</div>
@endsection