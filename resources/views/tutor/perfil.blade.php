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

  @if ($msg = Session::get("erro"))
    	
		{{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>
				<i class="bi bi-exclamation-triangle text-danger"></i>
				{{$msg}}
			</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div> --}}

		<div class="alert alert-primary alert-dismissible fade show position-fixed top-0 end-0 m-3 z-3" role="alert">
			<strong>
				<i class="bi bi-check-square-fill"></i>
				{{$msg}}
			</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		

	@endif
 
  <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 shadow" style="margin-top: 5px;">
                <div class="d-flex align-items-center">
                    @empty($tutor->foto_tutor)
                        <img src="{{ asset('img/student_5333052.png') }}" class="profile-pic" alt="Foto de perfil">
                    @else
                        <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                    @endempty
                    <div style="margin-left: 10px">
                        <h4 style="margin: 0px;">{{$tutor['nome_tutor']}}</h4>
                        <span class="" style="font-size: 10pt; font-family: monospace; margin: 0px; padding-left: 5px;"> 
                            *Tutor*
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
                    <i class="bi bi-mortarboard"> -</i> {{$tutor['nivel_academico']}}
                </p>
                <p style="color: #007bff;">
                    <i class="fa-brands fa-whatsapp"> -</i> {{$tutor['whatsapp']}}
                </p>
                <p style="color: #007bff;">
                    <i class="bi bi-telephone"> -</i> {{$tutor['telefone_tutor']}}
                </p>
                <p style="color: #007bff;">
                    <i class="bi bi-geo-alt"> -</i> {{$tutor['endereco']}}
                </p>
                <p style="color: #007bff;">
                    <i class="bi bi-file-text"> -</i> Sobre você: 
                    {{Str::limit($tutor['descricao'], 50)}}
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3" style="margin-top: 5px;">
                <form method="post" action="{{ route('perfilSpecialty') }}">
                    @csrf
                    <input type="hidden" name="id_tutor" value="{{$tutor['id']}}">
                    <h5 class="card-title">Criar Perfil de Especialidades</h5>
                    <label class="form-label"><strong>Escolhe uma Especialidade*</strong></label>
                    <select class="form-select mb-3" name="id_especialidade">
                        @foreach ($especialidades as $especialidade)
                        <option value="{{$especialidade->id}}">{{$especialidade->nome}}</option>
                        @endforeach
                    </select>

                    <label class="form-label"><strong>Escolhe o Tipo de Aula*</strong></label>
                    <select class="form-select mb-3" name="tipo">
                        <option value="1" selected>Coletiva</option>
                        <option value="2">Particular</option>
                    </select>

                    <label class="form-label"><strong>Nº de Alunos (para aula coletiva)*</strong></label>
                    <input name="num_aluno" type="number" class="form-control" value="2" aria-label="First name" min="2" required>

                    <label class="form-label"><strong>Custo*</strong></label>
                    <input name="custo" type="text" class="form-control" placeholder="Exemplo: 2000Kz" aria-label="custo" value="0" required>

                    <label class="form-label"><strong>Descrição*</strong></label>
                    <input name="descricao" type="text" class="form-control" placeholder="Fala sobre a aula" aria-label="custo" required>

                    <button class="btn btn-dark mt-3" type="submit">Criar</button>
                </form>
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

            @empty($perfil_esps->count())
            
                <div class="text-center">
                    <img src="{{ asset('img/ask_11049522.png') }}" style="width: 200px; height: 200px;" alt="vazio"><br>
                    <span><strong>Não há perfis para mostrar no momento!</strong></span>
                </div>

            @else        
            @foreach ($perfil_esps as $perfil_esp)
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
                            <strong>Custo:</strong> {{$perfil_esp->custo}} <br>
                            <div style="padding-bottom: 5px"></div>
                            <p class="text-muted small"> {{$perfil_esp->descricao}}</p>
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
            @endforeach
            @endempty
           
        </div>

</div>
<script>
    /*
    * Uso do 'strict mode' nas funcões imediatas para que possamos ter  
    * um código limpo.
    */
    (() => {
        'use strict';

        // Buscando os elementos DOM
        const tipo = document.getElementsByName("tipo")[0];
        const num_aluno = document.getElementsByName("num_aluno")[0];

        // Verificando se o tipo de aula é 'particular' ou coletiva
        tipo.addEventListener('change', () => {
            if (tipo.value === '2'){
                num_aluno.value = '1';
                num_aluno.setAttribute('disabled', '');
            }else{
                num_aluno.value = '2'
                num_aluno.attributes.removeNamedItem('disabled');
            }
        });
        
    })();
</script>
@endsection