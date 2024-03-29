<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Student | Mozart E-learning</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('logreg/css/style.css')); ?>">
		<link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
	</head>
<style>
    image-holder{
        background-image: url("http://img15.deviantart.net/cafe/i/2012/085/2/8/orange_stripe_background_by_sonnywolfie-d4u0e93.png");
        animation: moveIt 10s linear infinite;
        background-size: 261px;
    }
    @keyframes  moveIt{
        from {background-position:left;}
        to {background-position:right;}
    }
</style>
	<body>

		<div class="wrapper bg-student">
			<div class="inner" style="position:relative; left:20%; bottom: 20px;">
				<div class="image-holder" style="padding: 50px;">
                    <img src="<?php echo e(url('logreg/images/icon-student.png')); ?>">
				</div>

                <form method="POST" class="login100-form validate-form" action="<?php echo e(route('student.login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
                    <?php echo csrf_field(); ?>
					<h3>Login Student</h3>
					<div class="form-holder active">
							<input id="email" type="email" class="input100 form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" placeholder="Masukkan email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

							<?php if($errors->has('email')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('email')); ?></strong>
								</span>
							<?php endif; ?>
					</div>
					<div class="form-holder">
							<input id="password" type="password" class="input100 form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Masukkan password" name="password" required>

							<?php if($errors->has('password')): ?>
								<span class="invalid-feedback" role="alert">
									<strong><?php echo e($errors->first('password')); ?></strong>
								</span>
							<?php endif; ?>
					</div>
					<div class="checkbox">
					</div>
					<div class="form-login">
						<button class="p-1"><i class="fas fa-sign-in-alt"></i> Login</button>
							<a href="<?php echo e(route('student.register')); ?>" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
								Daftar
								<i class="fa fa-long-arrow-right m-l-5"></i>
							</a>
							<a href="<?php echo e(route('student.password.request')); ?>" style="margin-left:10px;" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
									Lupa password
									<i class="fa fa-long-arrow-right m-l-5"></i>
								</a>

								<br>
							</div>
							<hr>
									<div style="margin:10px; text-align:center; padding: 5px;">
										<a href="<?php echo e(route('login.student.provider', 'google')); ?>"  style="font-size:20px; margin:5px; border:1px solid red; padding:5px; border-radius:10px 10px;"><i class="fab fa-google-plus-g"></i> Gmail</a>
										<a href="<?php echo e(route('login.student.provider', 'facebook')); ?>"  style="font-size:20px; margin:5px; border:1px solid red; padding:5px; border-radius:10px 10px;"><i class="fab fa-facebook-square"></i> Facebook</a>
									</div>

									<p style="padding:10px;text-align:right;">Seorang mentor ?<a href="<?php echo e(route('mentor.login')); ?>">klik disini</a></p>


				</form>
			</div>
		</div>

		<script src="<?php echo e(asset('logreg/js/jquery-3.3.1.min.js')); ?>"></script>
		<script src="<?php echo e(asset('logreg/js/main.js')); ?>"></script>
		<?php if(Session::has('login')): ?>
			<script>
				alert(<?php echo e(Session::get('login')); ?>);
			</script>
		<?php endif; ?>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>






<?php /**PATH /home/wahyu/Desktop/mozart-elearning/resources/views/student/auth/login.blade.php ENDPATH**/ ?>