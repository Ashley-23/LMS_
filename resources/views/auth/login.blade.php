<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Page de connexion | {{ config('app.name') }}</title>

	@include('partials._styles')
</head>
<body class="login-page">
<div class="login-header box-shadow">
	<div class="container-fluid d-flex justify-content-between align-items-center">
		<div class="brand-logo">
			<a href="#" class="font-weight-bold" style="color: #0b132b">
				{{ config('app.name') }}
			</a>
		</div>
		<div class="login-menu">
			<ul>
				<li><a href="register.html">Créer mon compte</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<img src="{{asset('vendors/images/logo.png')}}" alt="">
			</div>
			<div class="col-md-6 col-lg-5">
				<div class="login-box bg-white box-shadow border-radius-10">
					<div class="login-title">
						<h2 class="text-center text-primary">Se connection à {{ config('app.name') }}</h2>
					</div>
					<form action="{{ route('login') }}" method="POST">
						@csrf
						<div class="select-role">
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn active">
									<input type="radio" name="options" id="admin">
									<div class="icon"><img src="{{asset('vendors/images/briefcase.svg')}}" class="svg" alt=""></div>
									<span>Je suis </span>
									Formateur
								</label>
								<label class="btn">
									<input type="radio" name="options" id="user">
									<div class="icon"><img src="{{asset('vendors/images/person.svg')}}" class="svg" alt=""></div>
									<span>Je suis</span>
									Apprenant
								</label>
							</div>
						</div>
						<div class="mb-3">
							<div class="input-group custom" style="margin-bottom: 0.5rem;">
								<input type="email" name="email" id="email" class="form-control form-control-lg"
								       placeholder="votre.mail@domaine.com" value="{{ old('email') }}" required autofocus>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							@error('email')
							<span class="text-danger text-sm">{{ $errors->first('email') }}</span>
							@enderror
						</div>
						<div class="input-group custom">
							<input type="password" name="password" id="password" class="form-control form-control-lg"
							       placeholder="**********">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
							</div>
						</div>
						<div class="row pb-30">
							<div class="col-6">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
									<label class="custom-control-label" for="customCheck1">Se souvenir de moi</label>
								</div>
							</div>
							<div class="col-6">
								<div class="forgot-password"><a href="forgot-password.html">Récupérer mon mot de passe</a></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block" type="submit" value="Me connecter">
								</div>
								<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Ou</div>
								<div class="input-group mb-0">
									<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Me créer un comte</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- js -->
@include('partials._scripts')
</body>
</html>
