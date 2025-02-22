<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TutorLink')</title>
    <link rel="shortcut icon" href="{{ asset('img/TutorLinkLogo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
        }
        .sidebar {
            width: 70px;
            height: 100vh;
            background: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding-top: 20px;
            transition: width 0.3s;
        }
        .sidebar:hover {
            width: 200px;
        }
        .sidebar a {
            text-decoration: none;
            color: #333;
            width: 90%;
            padding: 15px 10px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            transition: background 0.3s, border-radius 0.3s;
            border-radius: 10px;
            margin: 5px;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #333;
            border-radius: 10px;
        }
        .sidebar a#op:hover, .sidebar a#op.active {
            background: #157347;
            border-radius: 10px;
        }
        .sidebar a i {
            font-size: 24px;
            color: #3C4049;
        }
        .sidebar a span {
            margin-left: 15px;
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.3s;
            white-space: nowrap;
            color: white;
        }
        .sidebar:hover a span {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="sidebar sticky-top">
        <a href="{{ route('tutorHome') }}">
            <img src="{{ asset('img/TutorLinkLogo.svg') }}" alt="" style="width: 30px; height: 40px;">
            <span> TutorLink</span>
        </a>
        <a id="op" href="{{ route('tutorHome') }}" class=""><i class="bi bi-house-fill"></i><span> Home</span></a>
        <a id="op" href="{{ route('tutorPerfil') }}"><i class="bi bi-person-fill"></i><span> Perfil</span></a>
        <a id="op" href="{{ route('tutorNotifi') }}"><i class="bi bi-bell-fill"></i><span> Notificação</span></a>
        <a id="op" href="{{ route('tutorMsg') }}"><i class="bi bi-chat-dots-fill"></i><span> Mensagens</span></a>
        <br><br>
        
        <a id="op" href="#"><i class="bi bi-box-arrow-right"></i><span> Sair</span></a>
    </div>

    <div style="margin: 10px">
        @yield('layout_user')
    </div>


    
</body>
</html>
