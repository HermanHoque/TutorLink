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

    <div style="margin-top: 20px;">
      <ul class="nav nav-tabs" id="navTabs">
        <li class="nav-item">
          <a class="nav-link active" href="#" style="color: #3C4049">Não Aceites</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color: #3C4049">Aceites</a>
        </li>
      </ul>
    </div>

  </div>
  <br>
  <div class="container">
    
    @for ($i = 0; $i <= 5; $i++)
        <div class="cardNotifi">
            <img src="{{ asset('img/23.jpg') }}" class="profile-pic" alt="Imagem">
            <div>
                <h5>Solicitação de Madara Uchiha</h5>
                <p>Solicitação para aula Coletiva de programação.</p>
                <p><strong>Morada do Aluno:</strong> Cacuaco - Vidrul</p>
                <p><strong>Nível Académico:</strong> Ensino Médio</p>
                <div class="row d-grid gap-2" style="width: 300px; margin-top: 5px;">
                    <div class="col">
                        <a href="#" class="btn btn-outline-secondary btn-sm" style="margin-right: 5px;">
                            <i class="bi bi-check-circle"></i> Aceitar
                        </a>
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="bi bi-x-circle"></i> Terminar
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    @endfor
    
</div>

 <!-- Botão flutuante -->
 <button class="btn btn-danger position-fixed  top-0 end-0 m-3 rounded-circle shadow">
    <i class="bi bi-trash"></i> <!-- Ícone opcional -->
</button>




@endsection