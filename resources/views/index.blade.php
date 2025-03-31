<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TutorLink</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="shortcut icon" href="{{ asset('img/TutorLinkLogo.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Se quiser usar algum ícone, por exemplo Font Awesome: -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> -->
</head>
<body> 

  <!-- Header -->
  <header class="header">
    <nav class="navbar navbar-expand-lg container">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/TutorLinkLogo.svg') }}" alt="sem logo" style="width: 50px; height: 40px;">
          TutorLink</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <ul class="nav collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
          <li class="nav-item">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Pesquisar Tutor" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><div class="btn btn-success" style="color: #333333">Login</div></a>
          </li>
        </ul>

      </div>
    </nav>
  </header>

  <!-- Hero / Banner Principal -->
  <section class="hero">
    <div class="container hero-content">
      <h1>Seja Bem-Vindo a Plataforma de Ensino TutorLink!</h1>
      <h2 style="margin-bottom: 30px">Cria uma conta clicando na opção que deseja</h2>
      <div class="hero-buttons">
        <a href="{{ route('cadastroTutor') }}" class="btn btn-lg" style="background: #00B894;">Conta Tutor</a>
        <a href="{{ route('cadastroAluno') }}" class="btn btn-lg" style="background: #0AB6F8;">Conta Aluno</a>
      </div>
      <h2>Encontre um Tutor para te ajudar a entender diferentes áreas <br> ou disciplinas,
        ou seja um Tutor e receba contacto de Alunos na nossa plataforma</h2>
    </div>
  </section>

  <!-- Seção de Categorias -->
  <section class="categories">
    <div class="container">
      <h2>Encontre um Tutor para te ensinar sobre...</h2>
      <div class="categories-grid">
        <div class="category-item shadow p-3 mb-5 rounded">
          <h3>Programação</h3>
        </div>
        <div class="category-item shadow p-3 mb-5 rounded">
          <h3>Design Gráfico</h3>
        </div>
        <div class="category-item shadow p-3 mb-5 rounded">
          <h3>Matemática, Física</h3>
        </div>
        <div class="category-item shadow p-3 mb-5 rounded">
          <h3>Marketing Digital</h3>
        </div>
        <div class="category-item shadow p-3 mb-5 rounded">
          <h3>Línguas Estrangeiras</h3>
        </div>
        <div class="category-item shadow p-3 mb-5 rounded">
          <h3>E outras áreas diversas</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção Como Funciona -->
  <section class="how-it-works ">
    <div class="container">
      <h2>Como Funciona?</h2>
      <div class="steps">
        <div class="step">
          <i class="bi bi-person" style=""></i>
          <h3>1. Deixe o seu perfil ON</h3>
          <p>Se você é um Tutor na plataforma e quer ser encontrado, mantenha seu perfil ativo para que os Alunos possam encontrá-lo na plataforma.</p>
        </div>
        <div class="step">
          <i class="bi bi-exclamation-circle"></i>
          <h3>2. Limite de Alunos aceite por Tutor</h3>
          <p>Cada Tutor pode aceitar no máximo 5 Alunos na plataforma. Quando esse limite for atingido, a opção de aceitar novos Alunos será desativada até que o Tutor libere uma vaga ou conclua o contato com algum Aluno.</p>
        </div>
        <div class="step">
          <i class="bi bi-check-circle"></i>
          <h3>3. Selecione um Tutor</h3>
          <p>Se você é um Aluno, escolha o Tutor que melhor atende às suas necessidades na plataforma e negocie os detalhes e valores diretamente.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção Depoimentos -->
  <section class="testimonials">
    <div class="container">
      <h2>O que nossos clientes estão dizendo</h2>
      <div class="testimonials-grid">
        <div class="testimonial-item border border-black shadow p-3 mb-5 bg-body-tertiary rounded">
          <p>"Ótima plataforma para encontrar profissionais qualificados. A comunicação foi rápida e excelente!"</p>
          <span>- Cliente Satisfeito 1</span>
        </div>
        <div class="testimonial-item border border-black shadow p-3 mb-5 bg-body-tertiary rounded">
          <p>"Consegui trabalhos rapidamente e recebi pagamento com segurança. Recomendo a todos!"</p>
          <span>- Cliente Satisfeito 2</span>
        </div>
        <div class="testimonial-item border border-black shadow p-3 mb-5 bg-body-tertiary rounded">
          <p>"Muito simples de usar, excelente variedade de Tutores e áreas de atuação."</p>
          <span>- Cliente Satisfeito 3</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção Final -->
  <section class="cta border border-black border-1">
    <div class="container">
      <h2>O TutorLink é a ponte que conecta, de forma rápida e fácil, quem deseja aprender com quem tem a vontade por ensinar.
      </h2>
    
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <br>
      <div class="container text-center">
        <div class="row align-items-start">
          <div class="col">
            <h4><strong>TutorLink email para feedback</strong></h4>
            <p>emailaqui@gmail.com</p>
          </div>
          <div class="col">
           <h4><strong>Redes Sociais</strong></h4>
            <p>Instagram:</p>            
            <p>Facebook:</p>            
          </div>
          <div class="col">
            <h4><strong>Comunidade DEV</strong></h4>
          </div>
        </div>
      </div>
      <hr>
      <p>© 2025 - TutorLink. Todos os direitos reservados.</p>
    </div>
  </footer>

</body>
</html>
