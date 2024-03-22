<!-- views/email/verification.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun</title>
</head>

<body>
    <div class="container"
        style="background-color: #3498db; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center; margin: 20px auto; max-width: 400px;">
        <h1 style="color: #fff; font-family: 'Poppins', sans-serif; text-transform: uppercase;">Verifikasi Akun</h1>
        <p style="color: #fff;  font-family: 'Poppins', sans-serif;">Klik link di bawah untuk melakukan aktivasi akun:
        </p>
        <a href="<?= $verification_link ?>"
            style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #fff; color: #3498db; text-decoration: none; text-transform: uppercase;font-weight: bold; border-radius: 5px; font-family: 'Poppins', sans-serif;">Aktivasi
            Akun</a>
        <p style="color: #fff;  font-family: 'Poppins', sans-serif;">Batas verifikasi:
            <?= $verification_limit ?>
        </p>
    </div>
</body>

</html>