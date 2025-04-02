<!DOCTYPE html>
<html lang="en">
<head>
	<title>Logar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					
					<span class="login100-form-title p-b-48" style="height: 80px;">
						<img src="{{ asset('img/TutorLinkLogo.png') }}" alt="" style="width: 115px; height: 90px;"> 
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
						<input class="input100" type="password" name="pass">
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