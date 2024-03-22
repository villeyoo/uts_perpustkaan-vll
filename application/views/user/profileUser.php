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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />

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
                    <i class="fa-solid fa-bars-sort"></i>
                </button>


                <a href="#" class="navbar-brand">
                    <img src="<?= base_url('assets/images/ikon.png') ?>" alt="">
                </a>

                <!--
          - navbar navigation
        -->

                <nav class="">
                    <ul class="navbar-nav">

                        <li> <a href="<?= base_url('user') ?>" class="navbar-link ">Beranda</a> </li>
                        <li> <a href="#category" class="navbar-link">Kategori</a> </li>
                        <li> <a href="<?= base_url('user/profile') ?>" class="navbar-link indicator">Profile</a> </li>
                        <li class="dropdown" onclick="toggleDropdown()">
                            <a href="#" class="navbar-link">Transaksi</a>
                            <div class="dropdown-content" id="myDropdown">
                                <!-- Add your dropdown content here -->
                                <a href="#">Peminjaman buku</a>
                                <a href="#">Pengembalian buku</a>

                            </div>
                        </li>

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
                            <i class="fa-duotone fa-right-from-bracket fa-flip-horizontal"
                                style="--fa-primary-color: #005eff; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.7;"></i>
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
                        <?php if (isset($user['foto'])): ?>
                            <img class="detailbuku" src="<?= base_url('profile/' . $user['foto']); ?>">
                        <?php else: ?>
                            <p>Foto tidak tersedia</p>
                        <?php endif; ?>
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

                    </div>
                </div>
                <!----about section ----->

                <div class="about">
                    <h2>Profile saya</h2>


                    <div class="input-group">

                        <span classid="inputGroup-sizing-default">Email :</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="email" id="email"
                            value="<?= $user['email'] ?>" readonly>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nama :
                        </span>
                        <input type="text" class="form-control" name="name" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" name="name" id="name"
                            value="<?= $user['name'] ?>" readonly>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Kelas :
                        </span>
                        <input type="text" class="form-control" name="name" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="<?= $user['kelas'] ?>" readonly>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Kota :
                        </span>
                        <input type="text" class="form-control" name="name" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="<?= $user['kota'] ?>" readonly>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">jeniskelamin :
                        </span>
                        <input type="text" class="form-control" name="jeniskelamin" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="<?= $user['jeniskelamin'] ?>" readonly>
                    </div>
                    <div>
                        <br>

                        <a href="<?= base_url('user/edit/' . $user['id']); ?>">

                            <button class="btn btn-danger">edit profile</button>
                        </a>
                    </div>


                    <p>
                        My aim is to bring across your message and identity in the most creative way.
                        I created web design for many famous brand companies.
                    </p>

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

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        // Check if the query parameter 'save_success' is present in the URL
        const urlParams = new URLSearchParams(window.location.search);
        const saveSuccess = urlParams.get('save_success');

        if (saveSuccess === 'true') {
            Toast.fire({
                icon: "success",
                title: "Data berhasil disimpan"
            });
        }

        // Check if the query parameter 'delete_success' is present in the URL
        const deleteSuccess = urlParams.get('delete_success');

        if (deleteSuccess === 'true') {
            Toast.fire({
                icon: "success",
                title: "Data berhasil dihapus"
            });
        }

        // Check if the query parameter 'edit_success' is present in the URL
        const editSuccess = urlParams.get('edit_success');

        if (editSuccess === 'true') {
            Toast.fire({
                icon: "success",
                title: "Data berhasil diubah"
            });
        }
    </script>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("myDropdown");
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.navbar-link')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === "block") {
                        openDropdown.style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>