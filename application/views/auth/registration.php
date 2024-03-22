<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.ico') ?>" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
	<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css"
		href="<?= base_url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>"> -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/animate/animate.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/css-hamburgers/hamburgers.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/select2/select2.min.css') ?>">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/util.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/util.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/tampilan.css') ?>">

	<link rel="stylesheet" href="<?= base_url('assets/icon/css/bootsrap.min.css') ?>">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?= base_url('assets/images/ikon.png') ?>" alt="IMG">
				</div>
			</div>

			<form class="user" method="post" action="<?= base_url('auth/daftar') ?>">
				<span class="login100-form-title">
					DAFTAR AKUN
				</span>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" id="name" name="name" placeholder="Nama Lengkap"
						value="<?= set_value('name') ?>">
					<?= form_error('name', '<small class="text-danger pl-3">', '</small') ?>

					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-address-card"
							style="--fa-primary-color: #616161; --fa-secondary-color: #616161;"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input">
					<select class="input100" id="kelas" name="kelas">
						<option value="" selected disabled>Pilih Kelas</option>
						<option value="X RPL 1">X RPL 1</option>
						<option value="X RPL 2">X RPL 2</option>
						<option value="X RPL 3">X RPL 3</option>
						<option value="XI RPL 1">XI RPL 1</option>
						<option value="XI RPL 2">XI RPL 2</option>
						<option value="XI RPL 3">XI RPL 3</option>
						<option value="XII RPL 1">XII RPL 1</option>
						<option value="XII RPL 2">XII RPL 2</option>
						<option value="XII RPL 3">XII RPL 3</option>
						<!-- Add more options as needed -->
					</select>
					<?= form_error('kelas', '<small class="text-danger pl-3">', '</small') ?>

					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-screen-users"></i>
					</span>
				</div>


				<div class="wrap-input100 validate-input">
					<input class="input100" type="email" id="email" name="email" placeholder="Alamat Email"
						pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" required onchange="" value="<?= set_value('email') ?>">
					<?= form_error('email', '<small class="text-danger pl-3">', '</small') ?>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-envelope"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" id="kota" name="kota" placeholder="Kota tempat tinggal"
						value="<?= set_value('kota') ?>">
					<?= form_error('kota', '<small class="text-danger pl-3">', '</small') ?>

					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-regular fa-location-dot"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input">
					<select class="input100" id="jk" name="jk">
						<option value="" selected disabled>Jenis Kelamin</option>
						<option value="laki-laki">LAKI LAKI</option>
						<option value="perempuan">PEREMPUAN</option>
					</select>
					<?= form_error('jk', '<small class="text-danger pl-3">', '</small') ?>

					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-venus-mars"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" id="password1 " name="password1" placeholder="Kata Sandi"
						value="<?= set_value('password1') ?>">
					<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-lock"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" id="password2 " name="password2"
						placeholder="Konfirmasi Kata" value="<?= set_value('password1') ?>">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa-duotone fa-lock"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Buat Akun
					</button>
				</div>

				<div class="text-center p-t-12">
					<span class="txt1">
						Lupa
					</span>
					<a class="txt2" href="#">
						Kata Sandi?
					</a>
				</div>

				<div class="text-center p-t-20">
					<a class="txt2" href="<?= base_url() ?>">
						Sudah Punya Akun
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
	<script src="<?= base_url('assets/icon/js/bootstrap.min.js') ?>"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?= base_url('assets/js/main.js') ?>"></script>

</body>

</html>