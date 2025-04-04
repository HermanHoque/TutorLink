<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
	{{--  --}}

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<!--===============================================================================================-->	 
	<link rel="icon" type="image/png" href="{{ asset('img/TutorLinkLogo.svg') }}"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('iconic/css/material-design-iconic-font.min.css') }}">
	<!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>

	@if ($msg = Session::get("erro"))
    	
		{{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>
				<i class="bi bi-exclamation-triangle text-danger"></i>
				{{$msg}}
			</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div> --}}

		<div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 m-3 z-3" role="alert">
			<strong>
				<i class="bi bi-exclamation-triangle text-danger"></i>
				{{$msg}}
			</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		

	@endif

	<div class="limiter">		
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
					@csrf
					
					<span class="login100-form-title p-b-48" style="height: 95px;">
						<img src="{{ asset('img/TutorLinkLogo.svg') }}" alt="" style="width: 115px; height: 90px;"> 
					</span>
					<span class="login100-form-title p-b-26">
						TutorLink
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Não tem uma conta?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('util/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="js/main.js"></script>
</body>
</html>