@extends('aluno/layout')


@section('layout_user')

      <div id="cabecalho">
        <div class="row" id="title">
            <div class="col" style="font-size: 20pt">  
                <i class="bi bi-house"></i>
                <strong>Home</strong>
            </div>
        </div>
        <hr id="tracoHeader">
        
        {{-- formulario de pesquisa --}}
      <form action="{{ route('alunoHomeSearch') }}" method="get">
        @csrf
        <div class="input-group flex-nowrap">

            <span class="input-group-text" id="buscaid" style="background: #3C4049; color: white;">
                <i class="bi bi-search"></i>
            </span>

            <input value="{{ $search ?? '' }}" type="text" name="search" class="form-control" placeholder="Pesquisar Tutor...">

            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: #3C4049; margin-left: 10px; color: white;">
                    <i class="bi bi-filter"></i> Filtrar
                </button>
                <ul class="dropdown-menu p-2" style="min-width: 250px;">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filtroNome" name="filtros[]" value="nome"
                                {{ in_array('nome', request('filtros', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="filtroNome">Pesquisar por nome</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filtroEndereco" name="filtros[]" value="endereco"
                                {{ in_array('endereco', request('filtros', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="filtroEndereco">Pesquisar por Endereço</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="filtroEspecialidade" name="filtros[]" value="especialidade"
                                {{ in_array('especialidade', request('filtros', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="filtroEspecialidade">Pesquisar por Especialidade</label>
                        </div>
                    </li>
                </ul>
            </div> 
        </div>
      </form>

        {{-- fim do formulario de pesquisa --}}
      
        {{-- abas de navegação --}}
        <div style="margin-top: 20px;">
          <ul class="nav nav-tabs" id="navTabs">
            <li class="nav-item">
              <a class="nav-link active" href="#" style="color: #3C4049">All</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: #3C4049">Top Avaliações</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" style="color: #3C4049">Destaques</a>
            </li>
          </ul>
        </div>

      </div>

      {{-- cards linha--}}
  <div class="container">

      @if ($tutor_esp->isEmpty())
          <div class="alert" role="alert" style="text-align: center; margin-top: 20px; background-color: #3c4049a1; color: white;">
            <strong>
                Nenhum tutor encontrado.
              </strong>
          </div>
          
      @else
          
        <div class="row align-items-center">
          @foreach ($tutor_esp as $t_esp)
          {{-- cards --}}
          <div class="col" style="padding-top: 20px">
            <div class="container">
              <div class="card shadow-sm p-3">
                <div id="card-body">
                  {{-- foto perfil e info --}}
                    <div class="d-flex align-items-center">
                      @empty($t_esp->foto_tutor)
                        <img src="{{ asset('img/student_5333052.png') }}" class="profile-pic" alt="Foto de perfil">
                      @else
                          <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                      @endempty
                        <div>{{-- info tutor --}}
                            <h5 class="mb-0">{{$t_esp->nome_tutor}}</h5>
                            <small class="text-muted">
                              <i class="bi bi-geo-alt"> -</i> {{$t_esp->endereco}}
                            </small>
                        </div>
                    </div>
                    {{-- medias e avaliações --}}
                    <div class="d-flex mt-3">
                        <div style="padding: 10px;">
                            <strong><i class="bi bi-star-fill text-warning"></i> 10/10</strong>
                            <p class="text-muted small">nota média</p>
                        </div>
                        <div style="padding: 10px; text-align: center">
                            <strong><i class="bi bi-graph-up"></i> 94</strong>
                            <p class="text-muted small">avaliações</p>
                        </div>
                        
                    </div>
                    {{-- sobre o tutor --}}
                    <p>
                      <strong>Especialidades:</strong> 
                      @foreach ($t_esp->especialidade as $esp)
                        <span class="badge" id="btnH1">{{$esp->nome}}</span>
                      @endforeach
                    </p>

                    <p>
                      <strong>Nivél Académico:</strong> {{$t_esp->nivel_academico}}
                    </p>
                    <p class="text-muted small">{{$t_esp->descricao}}</p>
                </div>

                    <div class="card-footer d-flex gap-2">
                      <a href="{{ route('detalhes', $t_esp->uuid_tutor) }}" class="btn w-50"  id="btnH1">
                        Detalhes
                      </a>
                    <a href="#" class="btn btn-outline-secondary w-50">WhatsApp</a>
                  </div>                    
                  
              </div>
            </div>
          </div>
          @endforeach
        </div>
      
      @endif

        {{-- paginação --}}
        @include('aluno/home_pagination', ['paginator' => $tutor_esp])
        
  </div>
  
  
      
   
   
@endsection