<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.ico') ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="<?= base_url('assets/css/util.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/tampilan.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">

	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div>

		</div>
		<div class="container-login100">
			<div class="wrap-login">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url('assets/images/ikon.png') ?>" alt="IMG">
				</div>
			</div>

			<form class="user" method="post" action="<?= base_url('auth') ?>">
				<span class="login100-form-title">
					LOGIN
				</span>

				<?= $this->session->flashdata('message'); ?>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" id="email" name="email" placeholder="Masukan Email"
						value="<?= set_value('email') ?>">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small') ?>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-envelope"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="password" placeholder="Kata Sandi">
					<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-lock"></i>

					</span>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login200-form-btn">
						Masuk
					</button>
				</div>
				<div class="text-center p-t-2">
					<div class="text-center p-t-12">
						<span class="txt1">
							Lupa
						</span>
						<a class="txt2" href="#">
							Kata Sandi?
						</a>
					</div>

					<div class="text-center p-t-20">
						<a class="txt2" href="<?= base_url('auth/daftar') ?>">
							Buat akun
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
			</form>
		</div>
	</div>
	</div>




	<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>v"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/vendor/tilt/tilt.jquery.min.js') ?>"></script>

	<!-- SDK Google Sign-In -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script>
		function onSignIn(googleUser) {
			// Aksi yang ingin Anda lakukan setelah pengguna berhasil masuk
			var profile = googleUser.getBasicProfile();
			console.log('ID: ' + profile.getId()); // Contoh: Mendapatkan ID pengguna Google
			console.log('Full Name: ' + profile.getName()); // Contoh: Mendapatkan nama lengkap pengguna Google
			console.log('Email: ' + profile.getEmail()); // Contoh: Mendapatkan alamat email pengguna Google
		}

	</script>

	<script src="path/to/sweetalert2.all.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

	<?php
	// Ambil flashdata
	$message = $this->session->flashdata('message');
	if ($message):
		?>
		<script>
			Swal.fire({
				position: "top-end",
				icon: "success",
				title: "<?= $message; ?>",
				showConfirmButton: false,
				timer: 1500
			});
		</script>
	<?php endif; ?>


</body>

</html>