@extends('aluno/layout')


@section('layout_user')

    <div class="">
      <div class="row">
          <div class="col" style="font-size: 30pt">
              <i class="bi bi-house"></i>
              <strong>Home</strong>
          </div>
      </div>
      {{-- formulario de pesquisa --}}
      <form action="" method="get">
          <div class="input-group flex-nowrap">
              <span class="input-group-text" id="buscaid" style="background: #3C4049">
                  <i class="bi bi-search"></i>
              </span>
              <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="Username" aria-describedby="addon-wrapping">
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
      <div style="margin-top:10px; margin-bottom: 15px;">
          <a class="btn btn-outline-secondary" href="">Todos</a>
          <a class="btn btn-outline-secondary" href="">Melhores avaliações</a>
      </div>
      {{-- cards --}}
      @for ($i = 0; $i <= 1; $i++)
      <div class="container text-center">
          <div class="row align-items-center">
            <div class="col">
              <div class="card" style="width: 18rem;">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" id="btnH1" class="btn">Go somewhere</a>
                  </div>
                </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" id="btnH1" class="btn">Go somewhere</a>
                  </div>
                </div>
            </div>
            <div class="col">
              <div class="card" style="width: 18rem;">
                  <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" id="btnH1" class="btn">Go somewhere</a>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <br>
      @endfor
    </div>
   
@endsection