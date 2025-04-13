@extends('tutor/layout')

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
          <a class="nav-link active" href="{{ route('tutorNotifi') }}" style="color: #3C4049">Não Aceites</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('tutorNotifiAceite') }}" style="color: #3C4049">Aceites</a>
        </li>
      </ul>
    </div>

  </div>
  <br>
  <div class="container">
    @foreach ($solicitacoes as $s)
        <div class="cardNotifi position-relative p-3 mb-3" style="border: 1px solid #ccc; border-radius: 10px;">
            <div style="padding: 10px;">
                <div class="d-flex align-items-center">
                    @empty($aluno->foto_aluno){{-- foto --}}
                        <img src="{{ asset('img/school_16658380.png') }}" alt="Foto de perfil" class="perfil_foto" style="width: 50px; height: 50px;">
                    @else
                        <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Foto de perfil">
                    @endempty
                    <div>
                        <h5 class="mb-0"><strong>Solicitação de {{$s->aluno->nome_aluno}}</strong></h5>
                        @if ($s->perfil_especialidade->tipo == 1)
                            <p class="mb-1">Solicitação para aula Coletiva de {{$s->perfil_especialidade->especialidade->nome}}.</p>
                        @else
                            <p class="mb-1">Solicitação para aula Particular de {{$s->perfil_especialidade->especialidade->nome}}.</p>
                        @endif
                    </div>
                </div>

                <p><strong>Morada do Aluno:</strong> Cacuaco - Vidrul</p>
                <p><strong>Nível Académico:</strong> {{$s->aluno->nivel_academico}}</p>
                <p><strong>Telefone:</strong> {{$s->aluno->telefone_aluno}}</p>

                @if ($pag == 'aceite')
                    
                    <div class="row g-2" style="margin-top: 5px;">
                        <div class="col-auto">
                            <form action="{{ route('resposta') }}" method="POST">
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
                        <form action="{{ route('resposta') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_solici" value="{{$s->id}}">
                            <input type="hidden" name="rp" value="aceite">
                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-check-circle"></i> Aceitar
                            </button>
                        </form>
                    </div>

                    <div class="col-auto">
                        <form action="{{ route('resposta') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_solici" value="{{$s->id}}">
                            <input type="hidden" name="rp" value="recusada">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-x-circle"></i> Recusar
                            </button>
                        </form>
                    </div>
                </div>
                
                @endif

            </div>

            <!-- Data no canto inferior direito -->
            <div class="position-absolute bottom-0 end-0 me-2 mb-2 text-muted" style="font-size: 0.9rem;">
                {{ $s->created_at->format('Y/m/d') }}
            </div>
        </div>
    @endforeach
</div>


 <!-- Botão flutuante -->
 <button class="btn btn-danger position-fixed  top-0 end-0 m-3 rounded-circle shadow">
    <i class="bi bi-trash"></i> <!-- Ícone opcional -->
</button>




@endsection