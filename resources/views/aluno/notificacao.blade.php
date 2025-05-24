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
    
    @if ($msg = Session::get("notif"))

		<div class="alert alert-primary alert-dismissible fade show position-fixed top-0 end-0 m-3 z-3" role="alert">
			<strong>
				<i class="bi bi-check-square-fill"></i>
				{{$msg}}
			</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		
	@endif

    <div style="margin-top: 20px;">
      <ul class="nav nav-tabs" id="navTabs">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('alunoNotifi') }}" style="color: #3C4049">Não Lidas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('alunoNotifiLida') }}" style="color: #3C4049">Lidas</a>
        </li>
      </ul>
    </div>

  </div>
  <br>
  <div class="container">
    
    @foreach ($solicitacoes as $s)
        <div class="cardNotifi position-relative p-3 mb-3">
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
                    
                    {{-- <div class="row g-2" style="margin-top: 5px;">
                        <div class="col-auto">
                            <form action="{{ route('confirmNotifi') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta notificação?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id_solici" value="{{$s->id}}">
                                <input type="hidden" name="op" value="excluir2">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-circle"></i> Excluir notificação
                                </button>
                            </form>
                        </div>
                    </div> --}}

                @else

                <div class="row g-2" style="margin-top: 5px;">
                    <div class="col-auto">
                        <form action="{{ route('confirmNotifi') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_solici" value="{{$s->id}}">
                            <input type="hidden" name="op" value="ok">
                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-check-circle"></i> OK
                            </button>
                        </form>
                    </div>

                    <div class="col-auto">
                        <form action="{{ route('confirmNotifi') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta notificação?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id_solici" value="{{$s->id}}">
                            <input type="hidden" name="op" value="excluir">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-x-circle"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
                
                @endif
            </div>
            
            <!-- Data no canto inferior direito -->
            <div class="position-absolute bottom-0 end-0 me-2 mb-2 text-muted" style="font-size: 0.9rem;">
                {{ $s->updated_at->format('Y/m/d') }}
            </div>
        </div>
    @endforeach
    
</div>

 <!-- Botão flutuante -->
 <form action="{{ route('deleteAll') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta notificação?');">
    @csrf
    @method('DELETE')
    <input type="hidden" name="perfil" value="aluno">
    <input type="hidden" name="pag" value="{{$pag}}">
    <input type="hidden" name="id" value="{{$id_aluno}}">
     <button type="submit" class="btn btn-danger position-fixed  top-0 end-0 m-3 rounded-circle shadow">
        <i class="bi bi-trash"></i> <!-- Ícone opcional -->
     </button>
 </form>




@endsection