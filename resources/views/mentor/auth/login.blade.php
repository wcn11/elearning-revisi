<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mentor | Mozart E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ asset('logreg/css/style.css')}}">
	</head>
<style>
    image-holder{
        background-image: url("http://img15.deviantart.net/cafe/i/2012/085/2/8/orange_stripe_background_by_sonnywolfie-d4u0e93.png");
        animation: moveIt 10s linear infinite;
        background-size: 261px;
    }
    @keyframes moveIt{
        from {background-position:left;}
        to {background-position:right;}
    }
	/* .bg-image{
		background-image: url();
	} */
</style>
	<body>

		<div class="wrapper bg-mentor">
			<div class="inner" style="position:relative; left:20%;">
				<div class="image-holder" style="padding: 50px;">
                    <img src="{{ url('logreg/images/icon-mentor.jpg') }}" style="width: 700px; height: 300px;">
				</div>
                <form method="POST" class="login100-form validate-form" action="{{ route('mentor.login') }}" aria-label="{{ __('Login') }}">
                    @csrf
					<h3>Login Mentor</h3>
					<div class="form-holder active">
							<input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Masukkan email" name="email" value="{{ old('email') }}" required autofocus>

							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
					</div>
					<div class="form-holder">
							<input id="password" type="password" class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Masukkan password" name="password" required>

							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
					</div>
					<div class="checkbox">
					</div>
					<div class="form-login">
						<button>Login</button>
							<a href="{{route('mentor.register')}}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
								Daftar
								<i class="fa fa-long-arrow-right m-l-5"></i>
							</a>
							<a href="{{ route('mentor.password.request') }}" style="margin-left:10px;" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
									Lupa password
									<i class="fa fa-long-arrow-right m-l-5"></i>
								</a>

								{{-- <a href="{{ route('login.mentor.provider', 'google') }}" class="btn btn-danger">{{ __('Google Sign in') }}</a>
								<a href="{{ route('login.mentor.provider', 'facebook') }}" class="btn btn-danger">{{ __('Facebook Sign in') }}</a> --}}
					</div>

					<p style="padding:10px;text-align:right;">Seorang student ?<a href="{{ route('student.login') }}"> klik disini</a></p>
				</form>
			</div>
		</div>

		<script src="{{ asset('logreg/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{ asset('logreg/js/main.js')}}"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>



