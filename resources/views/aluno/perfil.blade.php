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
            @if ($msg = Session::get("notif"))

                <div class="alert alert-primary alert-dismissible fade show position-fixed top-0 end-0 m-3 z-3" role="alert">
                    <strong>
                        <i class="bi bi-check-square-fill"></i>
                        {{$msg}}
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif

              @if ($msg = Session::get("notif2"))

                <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3 z-3" role="alert">
                    <strong>
                        <i class="bi bi-x-square-fill"></i>
                        {{$msg}}
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                
            @endif
    </div>

<div class="container mt-4">
    <div class="row">
        <!-- card perfil -->
        <div class="col" style="margin-top: 5px;">
            <div id="cardPerfil">
                <div class="info_user">
                    <div class="d-flex align-items-center">
                        @empty($aluno->foto_aluno){{-- foto --}}
                            <img src="{{ asset('storage/fotosImgs/school_16658380.png') }}" data-bs-toggle="modal" data-bs-target="#modalFotoPerfil" alt="Foto de perfil" class="perfil_foto" style="width: 50px; height: 50px;">
                        @else
                            <img src="{{ asset('storage/fotosImgs/' . $aluno->foto_aluno) }}" data-bs-toggle="modal" data-bs-target="#modalFotoPerfil" alt="Foto de perfil" class="perfil_foto" style="width: 50px; height: 50px;">
                        @endempty
                        <div>
                            <h4 style="margin: 0px;">{{$aluno['nome_aluno']}}</h4>
                            <span style="font-size: 10pt; font-family: monospace; margin: 0px; padding-left: 5px; color: rgba(0, 0, 0, 0.4);">
                                <em>*Aluno*</em>
                            </span>                            
                        </div>
                         <!-- Botão "Editar perfil" no lado direito -->
                         <div class="ms-auto">
                            <button class="btn btn-sm rounded-circle" data-bs-toggle="modal" data-bs-target="#editarPerfilModal" style="background-color: #157347; color: white">
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
                            <strong style="padding-left: 15px;">{{$perfil_esps->count()}}</strong>
                            <p>Aulas</p>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
        <!-- fim card perfil  -->

        <!-- Card Solicitações -->
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
                        @empty($solicitacoes->count())
                        <div class="text-center">
                            <img src="{{ asset('img/ask_11049522.png') }}" style="width: 100px; height: 100px;" alt="vazio"><br>
                            <span><strong>Não há solicitações no momento!</strong></span>
                        </div>
                        
                        @else
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
                        @endempty
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
                            <button class="btn btn-outline-secondary w-50" data-bs-toggle="modal" data-bs-target="#avaliacaoModal">
                                Avaliar
                            </button>
                            <button class="btn btn-danger w-50">
                                Terminar
                            </button>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Modal para avaliação -->
        <div class="modal fade" id="avaliacaoModal" tabindex="-1" aria-labelledby="avaliacaoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg" style="max-width: 500px; margin:auto;">
            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title" id="modalFotoPerfilLabel">
                <i class="bi bi-star-fill"></i> Avaliar Aula
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('saveAvaliacao') }}" method="POST">
                @csrf

                <input type="hidden" name="id_tutor" value="{{$p_esp->perfil_especialidade->tutor->id}}">
                <input type="hidden" name="id_aluno" value="{{$aluno->id}}">

                <!-- Clareza -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Clareza da Explicação</label>
                    <input type="range" class="form-range custom-range" min="0" max="10" step="1" 
                            name="clareza" id="clareza"
                            oninput="document.getElementById('clareza_val').innerText=this.value">
                    <div class="d-flex justify-content-between">
                        <small>0</small>
                        <span class="badge bg-primary" id="clareza_val">5</span>
                        <small>10</small>
                    </div>
                </div>

                <!-- Domínio -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Domínio do Assunto</label>
                    <input type="range" class="form-range custom-range" min="0" max="10" step="1" 
                            name="dominio" id="dominio"
                            oninput="document.getElementById('dominio_val').innerText=this.value">
                    <div class="d-flex justify-content-between">
                        <small>0</small>
                        <span class="badge bg-success" id="dominio_val">5</span>
                        <small>10</small>
                    </div>
                </div>

                <!-- Interatividade -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Interatividade com o Aluno</label>
                    <input type="range" class="form-range custom-range" min="0" max="10" step="1" 
                            name="interatividade" id="interatividade"
                            oninput="document.getElementById('interatividade_val').innerText=this.value">
                    <div class="d-flex justify-content-between">
                        <small>0</small>
                        <span class="badge bg-warning text-dark" id="interatividade_val">5</span>
                        <small>10</small>
                    </div>
                </div>

                <!-- Organização -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Organização das Aulas</label>
                    <input type="range" class="form-range custom-range" min="0" max="10" step="1" 
                            name="organizacao" id="organizacao"
                            oninput="document.getElementById('organizacao_val').innerText=this.value">
                    <div class="d-flex justify-content-between">
                        <small>0</small>
                        <span class="badge bg-info" id="organizacao_val">5</span>
                        <small>10</small>
                    </div>
                </div>

                <!-- Comentário -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Comentário (opcional)</label>
                    <textarea name="comentario" class="form-control rounded-3" rows="3"
                                placeholder="Escreva sua opinião..."></textarea>
                </div>

                <!-- Botão -->
                <div class="text-center">
                    <button type="submit" class="btn px-4 py-2 rounded-pill shadow-sm" style="background-color: #157347; color: white;">
                        <i class="bi bi-check-circle"></i> Enviar Avaliação
                    </button>
                </div>

                </form>

            </div>
            </div>
        </div>
        </div>
        <!-- Fim Modal avaliação -->


        @endforeach
        @endempty

        @include('aluno/pagination', ['paginator' => $perfil_esps])
    </div>
    <!-- fim cards aulas -->



    <!-- Modal editar perfil-->
    <div class="modal fade" id="editarPerfilModal" tabindex="-1" aria-labelledby="editarPerfilModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow">
        <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="editarPerfilModalLabel">
            <i class="bi bi-person-circle"></i> Editar Perfil
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <form action="{{ route('editPerfilAluno') }}" method="POST">
            @csrf
            <div class="modal-body">
            
            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label fw-bold">
                <i class="bi bi-person"></i> Nome
                </label>
                <input type="text" class="form-control" id="nome" name="nome_aluno" value="{{ $aluno['nome_aluno'] }}" required>
            </div>

            <!-- Status (Aluno - não editável) -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                <i class="bi bi-mortarboard"></i> Status
                </label>
                <input type="text" class="form-control" value="Aluno" disabled>
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="telefone" class="form-label fw-bold">
                <i class="bi bi-telephone"></i> Telefone
                </label> 
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$aluno['telefone_aluno']}}">
            </div>

            <!-- Curso -->
            <div class="mb-3">
                <label for="curso" class="form-label fw-bold">
                <i class="bi bi-journal-bookmark"></i> Nível Acadêmico
                </label>
                <input type="text" class="form-control" id="curso" name="nivel_acad" value="{{$aluno['nivel_academico']}}">
            </div>

            <!-- Sobre você -->
            <div class="mb-3">
                <label for="sobre" class="form-label fw-bold">
                <i class="bi bi-file-text"></i> Sobre você
                </label>
                <textarea class="form-control" id="sobre" name="descricao" rows="3">{{$aluno['descricao']}}</textarea>
            </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Cancelar
            </button>
            <button type="submit" class="btn" style="background-color: #157347; color: white;">
                <i class="bi bi-save"></i> Salvar Alterações
            </button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Fim Modal editar perfil-->


   <!-- Modal foto perfil -->
    <div class="modal fade" id="modalFotoPerfil" tabindex="-1" aria-labelledby="modalFotoPerfilLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4">
        <div class="modal-header bg-primary text-white rounded-top-4">
            <h5 class="modal-title" id="modalFotoPerfilLabel">
            <i class="bi bi-person-circle me-2"></i> Alterar Foto de Perfil
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
       <form action="{{ route('editFotoAluno') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body text-center">
                <!-- Preview -->
                <img id="preview-foto" src="{{ asset('storage/fotosImgs/' . ($aluno->foto_aluno ?? 'school_16658380.png')) }}" 
                    class="rounded-circle mb-3 shadow-sm" 
                    style="width: 120px; height: 120px; object-fit: cover;">

                <!-- Input -->
                <div class="mb-3">
                    <input class="form-control" type="file" id="foto" name="foto_aluno" accept="image/*" onchange="previewFoto(event)">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn" style="background-color: #157347; color: white;">
                    <i class="bi bi-save"></i> Salvar
                </button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Fim Modal foto perfil -->




<!-- CSS para os ticks nos sliders -->
<style>
.custom-range {
    background: repeating-linear-gradient(
        to right,
        #ccc,
        #ccc 1px,
        transparent 1px,
        transparent calc(100%/11)
    );
}
</style>






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



        function previewFoto(event) {
        const img = document.getElementById('preview-foto');
        img.src = URL.createObjectURL(event.target.files[0]);
  }

    </script>




@endsection