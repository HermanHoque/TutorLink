<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TutorLink')</title>
    <link rel="shortcut icon" href="{{ asset('img/TutorLinkLogo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('css/Edit_bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleTutor.css') }}">
    
</head>
<body>
    <div class="sidebar d-none d-md-flex sticky-top">
        <a href="{{ route('tutorHome') }}">
            <img src="{{ asset('img/TutorLinkLogo.svg') }}" alt="" style="width: 30px; height: 40px;">
            <span> TutorLink</span>
        </a>
        <a id="op" href="{{ route('tutorHome') }}" class=""><i class="bi bi-house-fill"></i><span> Home</span></a>
        <a id="op" href="{{ route('tutorPerfil') }}"><i class="bi bi-person-fill"></i><span> Perfil</span></a>
        <a id="op" href="{{ route('tutorNotifi') }}"><i class="bi bi-bell-fill"></i><span> Notificação</span></a>
        <a id="op" href="{{ route('tutorMsg') }}"><i class="bi bi-chat-dots-fill"></i><span> Mensagens</span></a>
        <br><br>
        
        <a id="op" href="#"><i class="bi bi-box-arrow-right"></i><span>Sair</span></a>
    </div>

    <div class="main-content">
        @yield('layout_user')
        <br><br><br>
    </div>

    <div class="bottom-menu d-md-none">
        <a href="{{ route('tutorHome') }}"><i class="bi bi-house-fill"></i><span>Home</span></a>
        <a href="{{ route('tutorPerfil') }}"><i class="bi bi-person-fill"></i><span>Perfil</span></a>
        <a href="{{ route('tutorNotifi') }}"><i class="bi bi-bell-fill"></i><span>Notificações</span></a>
        <a href="{{ route('tutorMsg') }}"><i class="bi bi-chat-dots-fill"></i><span>Mensagens</span></a>
        <a href="#"><i class="bi bi-box-arrow-right"></i><span>Sair</span></a>
    </div>

    <script>
        document.querySelectorAll("#navTabs .nav-link").forEach(link => {
          link.addEventListener("click", function() {
            // Remove a classe 'active' de todos os links
            document.querySelectorAll("#navTabs .nav-link").forEach(el => el.classList.remove("active"));
            
            // Adiciona a classe 'active' apenas ao link clicado
            this.classList.add("active");
          });
        });
      </script>

    
</body>
</html>
