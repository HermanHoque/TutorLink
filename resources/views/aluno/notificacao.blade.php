@extends('aluno/layout')

@section('layout_user')
<div id="cabecalho">
    <div class="row" id="title">
        <div class="col" style="font-size: 20pt">
            <i class="bi bi-bell"></i>
            <strong>Notificações</strong>
        </div>
    </div>
    <hr id="tracoHeader">   

    <div style="margin-top: 20px;">
      <ul class="nav nav-tabs" id="navTabs">
        <li class="nav-item">
          <a class="nav-link active" href="#" style="color: #3C4049">Não Lidas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: #3C4049">Lidas</a>
        </li>
      </ul>
    </div>

  </div>
  <br>
  <div class="container">
    
    @foreach ($solicitacoes as $s)
        <div class="cardNotifi">
            <div style="padding: 10px;">
                <div class="d-flex align-items-center">
                  @empty($s->tytor->foto_tutor){{-- foto --}}
                      <img src="{{ asset('img/student_5333052.png') }}" alt="Foto de perfil" class="perfil_foto" style="width: 50px; height: 50px;">
                  @else
                      <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                  @endempty
                  <div>
                      <h5 class="mb-0"><strong>Solicitação de aula para {{$s->tutor->nome_tutor}}</strong></h5>
                      @if ($s->perfil_especialidade->tipo == 1)
                          <p class="mb-1">Sua solicitação para aula Coletiva de {{$s->perfil_especialidade->especialidade->nome}} foi {{$s->resposta_tutor}}.</p>
                      @else
                          <p class="mb-1">Sua solicitação para aula Particular de {{$s->perfil_especialidade->especialidade->nome}} foi {{$s->resposta_tutor}}.</p>
                      @endif
                  </div>
              </div>

                @if ($pag == 'lida')
                    
                    <div class="row g-2" style="margin-top: 5px;">
                        <div class="col-auto">
                            <form action="">
                                @csrf
                                <input type="hidden" name="id_solici" value="{{$s->id}}">
                                <input type="hidden" name="rp" value="recusada">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle"></i> Excluir notificação
                                </button>
                            </form>
                        </div>
                    </div>

                @else

                <div class="row g-2" style="margin-top: 5px;">
                    <div class="col-auto">
                        <form action="">
                            @csrf
                            <input type="hidden" name="id_solici" value="{{$s->id}}">
                            <input type="hidden" name="rp" value="ok">
                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-check-circle"></i> OK
                            </button>
                        </form>
                    </div>

                    <div class="col-auto">
                        <form action="">
                            @csrf
                            <input type="hidden" name="id_solici" value="{{$s->id}}">
                            <input type="hidden" name="rp" value="excluir">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-x-circle"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
                
                @endif

            </div>
        </div>
    @endforeach
    
</div>

 <!-- Botão flutuante -->
 <button class="btn btn-danger position-fixed  top-0 end-0 m-3 rounded-circle shadow">
    <i class="bi bi-trash"></i> <!-- Ícone opcional -->
</button>




@endsection