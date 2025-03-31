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
        <form action="" method="get">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="buscaid" style="background: #3C4049">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control" placeholder="Pesquisar Tutor..." aria-label="Username" aria-describedby="addon-wrapping">
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                    style="background: #3C4049; margin-left: 10px;">
                        <i class="bi bi-filter"></i> Filtrar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Pesquisar por nome</a></li>
                        <li><a class="dropdown-item" href="#">Pesquisar por especialidade</a></li>
                    </ul>
                </div> 
            </div>
        </form>
        

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
        
          <div class="row align-items-center">
            @for ($i = 1; $i <= 6; $i++)
            {{-- cards --}}
            <div class="col" style="padding-top: 20px">
              <div class="container">
                <div class="card shadow-sm p-3">
                  <div id="card-body">
                    {{-- foto perfil e info --}}
                      <div class="d-flex align-items-center">
                          <img src="{{ asset('img/04ed3062ae591647e73e80cd8ec972b5.jpg') }}"
                          alt="Foto de perfil" class="profile-pic me-3">
                          <div>{{-- info tutor --}}
                              <h5 class="mb-0">Madara Uchiha</h5>
                              <small class="text-muted">
                                <i class="bi bi-geo-alt"> -</i> Konoha
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
                        <strong>Especialidades:</strong> Inglês, Matemática, Física
                      </p>
                      <p>
                        <strong>Nivél Académico:</strong> Hokage das Sombras
                      </p>
                      <p class="text-muted small">Madara Uchiha é um dos vilões mais poderosos e carismáticos de Naruto. Ele foi um dos fundadores da Vila Oculta da Folha (Konoha), ao lado de Hashirama Senju, mas sua visão distorcida de paz e justiça o levou a se tornar um antagonista.</p>
                  </div>
                    <div class="card-footer d-flex gap-2">
                      <a href="{{ route('detalhes') }}" class="btn w-50"  id="btnH1">Detalhes</a>
                      <a href="#" class="btn btn-outline-secondary w-50">WhatsApp</a>
                    </div>
                </div>
              </div>
            </div>
            @endfor 
        </div>
        
  </div>
  
  
      
   
   
@endsection