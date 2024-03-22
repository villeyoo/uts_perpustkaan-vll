<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/icon.png" type="image/png">
    <title>Pintar Literasi</title>

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="<?= base_url('assetsUser/') ?>css/main.css">
    <link rel="stylesheet" href="<?= base_url('assetsUser/') ?>css/media_query.css">
    <!-- <link rel="stylesheet" href="<?= base_url('assetsUser/') ?>css/user.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">

</head>

<body>




    <!--
    - main container
  -->
    <div class="container1">

        <!--
      - #HEADER SECTION
    -->

        <header class="">
            <div class="navbar">

                <!--
          - menu button for small screen
        -->
                <button class="navbar-menu-btn">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>


                <a href="#" class="navbar-brand">
                    <h1>Pintar Literasi</h1>
                </a>

                <!--
          - navbar navigation
        -->

                <nav class="">
                    <ul class="navbar-nav">

                        <li> <a href="<?= base_url('user') ?>" class="navbar-link">Beranda</a> </li>
                        <li> <a href="#category" class="navbar-link">Kategori</a> </li>
                        <li> <a href="" class="navbar-link  indicator">Profile saya</a> </li>

                    </ul>
                </nav>

                <!--
          - search and sign-in
        -->

                <div class="navbar-actions">
                    <form method="post" action="<?= base_url('user/cari') ?>" class="navbar-form">
                        <input type="text" name="keyword" placeholder="Cari Buku..." class="navbar-form-search">

                        <button class="navbar-form-btn">
                            <ion-icon name="search-outline"></ion-icon>
                        </button>

                        <button type="submit" class="navbar-form-close">
                            <ion-icon name="close-circle-outline"></ion-icon>
                        </button>
                    </form>

                    <!-- <form action="" method="post" class="navbar-form">
                    </form> -->


                    <!--
            - search button for small screen
          -->

                    <button class="navbar-search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>

                    <a href="<?= base_url('auth/logout') ?>" class="navbar-signin">
                        <span>Keluar
                            <i class="fa-duotone fa-arrow-right-from-bracket fa-flip-horizontal"
                                style="--fa-primary-color: #ffffff; --fa-secondary-color: #0aceff;"></i>
                        </span>
                    </a>

                </div>

            </div>
        </header>





        <!--
      - MAIN SECTION
    -->
        <!-- MAIN SECTION -->
        <main>
            <div class="container">
                <div class="profile-card">
                    <div class="profile-pic">
                        <img id="preview" src="<?= base_url('assets/') ?>images/prof.png" alt="Preview">
                    </div>

                    <div class="profile-details">
                        <div class="intro">
                            <h2 class="nama">
                                <?= isset($user['name']) ? strtoupper($user['name']) : 'Tidak ada nama'; ?>
                            </h2>
                            <h5>
                                <?= isset($user['kelas']) ? strtoupper($user['kelas']) : 'Tidak ada kelas'; ?>
                            </h5>
                        </div>
                        <br>
                        <br>

                        <div class="contact-info">
                            <div class="row">
                                <div class="icon">
                                    <i class="fa-duotone fa-envelopes"></i>
                                </div>
                                <div class="content">
                                    <span>Email</span>
                                    <h5 class="email">
                                        <?= isset($user['email']) ? strtoupper($user['email']) : 'Tidak ada kelas'; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('user/updateProfile') ?>" method="post"
                            enctype="multipart/form-data">
                            <label for="fileInput" class="file-input-label">
                                <i class="fa-duotone fa-cloud-arrow-up"></i> Pilih Profile anda
                            </label>
                            <input class="file-input" type="file" id="fileInput" name="sampul" required
                                onchange="previewImage()">
                            </a>
                            <div style="text-align:center;">
                                <button class="btn btn-danger" type="submit">
                                    simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <div>
        <button id="scrollToTopBtn" title="Go to top">
            <ion-icon name="arrow-up"></ion-icon>
        </button>
    </div>



    <!--
      - FOOTER SECTION
    -->
    <footer>

        <div class="footer-content">

            <div class="footer-brand">
                <img src="<?= base_url('assetsUser/') ?>images/logo.png" alt="" class="footer-logo">
                <p class="slogan">Movies & TV Shows, Online cinema,
                    Movie database HTML Template.</p>


                <div class="social-link">

                    <a href="#">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-tiktok"></ion-icon>
                    </a>
                    <a href="#">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>

                </div>
            </div>


            <div class="footer-links">
                <ul>

                    <h4 class="link-heading">Pintar Literasi</h4>

                    <li class="link-item"><a href="#">About us</a></li>
                    <li class="link-item"><a href="#">My profile</a></li>
                    <li class="link-item"><a href="#">Pricing plans</a></li>
                    <li class="link-item"><a href="#">Contacts</a></li>

                </ul>

                <ul>

                    <h4 class="link-heading">Browse</h4>

                    <li class="link-item"><a href="#">Live Tv</a></li>
                    <li class="link-item"><a href="#">Live News</a></li>
                    <li class="link-item"><a href="#">Live Sports</a></li>
                    <li class="link-item"><a href="#">Streaming Library</a></li>

                </ul>

                <ul>

                    <li class="link-item"><a href="#">TV Shows</a></li>
                    <li class="link-item"><a href="#">Movies</a></li>
                    <li class="link-item"><a href="#">Kids</a></li>
                    <li class="link-item"><a href="#">Collections</a></li>

                </ul>

                <ul>

                    <h4 class="link-heading">Help</h4>

                    <li class="link-item"><a href="#">Account & Billing</a></li>
                    <li class="link-item"><a href="#">Plans & Pricing</a></li>
                    <li class="link-item"><a href="#">Supported devices</a></li>
                    <li class="link-item"><a href="#">Accessibility</a></li>

                </ul>
            </div>

        </div>

        <div class="footer-copyright">

            <div class="copyright">
                <p>&copy; copyright 2021 CineFlix</p>
            </div>

            <div class="wrapper">
                <a href="#">Privacy policy</a>
                <a href="#">Terms and conditions</a>
            </div>

        </div>

    </footer>

    </div>





    <!--
    - custom js link
  -->
    <script src="<?= base_url('assetsUser/') ?>js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var scrollToTopBtn = document.getElementById("scrollToTopBtn");

            window.addEventListener("scroll", function () {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    scrollToTopBtn.style.display = "block";
                } else {
                    scrollToTopBtn.style.display = "none";
                }
            });

            scrollToTopBtn.addEventListener("click", function () {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
            });
        });

    </script>
    <script>
        function previewImage() {
            console.log('Function previewImage() called.'); // Tambahkan baris ini

            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('fileInput');
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log('Image preview updated.'); // Tambahkan baris ini
                    preview.src = e.target.result;
                    document.querySelector('.overlay-text').innerText = '';
                };

                reader.readAsDataURL(file);
            } else {
                console.log('No file selected.'); // Tambahkan baris ini
                preview.src = 'assets/images/buku.jpg';
            }
        }
    </script>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>