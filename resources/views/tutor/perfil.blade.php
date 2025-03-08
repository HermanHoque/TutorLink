@extends('tutor/layout')

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
        <div class="col-md-6">
            <div class="card p-3" style="margin-top: 5px;">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                    <div style="margin-left: 10px">
                        <h4>Eren Yeger</h4>
                        <button class="btn btn-sm" style="background-color: #157347; color: white">
                            <i class="bi bi-pencil-square"></i> Editar perfil
                        </button>
                    </div>
                </div>
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
                <p style="color: #007bff;">
                    <i class="bi bi-file-text"> -</i> Sobre você: Eren Yeager é o protagonista de Attack on Titan (Shingeki no Kyojin), mas sua jornada é repleta de ambiguidades morais. No início, ele é motivado por um desejo de vingança contra os Titãs após testemunhar a destruição de sua cidade e a morte de sua mãe...
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3" style="margin-top: 5px;">
                <form method="post">
                    <h5 class="card-title">Criar Perfil de Especialidades</h5>
                    <label class="form-label"><strong>Escolhe uma Especialidade*</strong></label>
                    <select class="form-select mb-3" name="id_especialidade">
                        <option value="" selected>Matemática</option>
                        <option value="">Física</option>
                        <option value="">Programação WEB</option>
                    </select>

                    <label class="form-label"><strong>Escolhe o Tipo de Aula*</strong></label>
                    <select class="form-select mb-3" name="tipo">
                        <option value="1" selected>Coletiva</option>
                        <option value="2">Particula</option>
                    </select>

                    <label class="form-label"><strong>Nº de Alunos (para aula coletiva)*</strong></label>
                    <input name="num_aluno" type="number" class="form-control" value="2" aria-label="First name" min="2">

                    <label class="form-label"><strong>Custo*</strong></label>
                    <input name="custo" type="number" class="form-control" placeholder="Exemplo: 2000" aria-label="custo" value="0" required>

                    <label class="form-label"><strong>Descrição*</strong></label>
                    <input name="descricao" type="text" class="form-control" placeholder="Fala sobre a especialidade" aria-label="custo">

                    <button class="btn btn-dark mt-3" type="submit">Criar</button>
                </form>
            </div>
        </div>
    </div>
    {{-- perfis de especialidades --}}
    <br>
    <h3><strong>Seus Perfis</strong></h3>
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