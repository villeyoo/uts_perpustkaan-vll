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
    <link rel="stylesheet" href="<?= base_url('assetsUser/css/pinjam.css') ?>">
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
                        <li> <a href="<?= base_url('user/profile') ?>" class="navbar-link ">Profile</a> </li>
                        <li class="dropdown" onclick="toggleDropdown()">
                            <a href="#" class="navbar-link indicator    ">Transaksi</a>
                            <div class="dropdown-content" id="myDropdown">
                                <!-- Add your dropdown content here -->
                                <a href="<?= base_url('peminjaman') ?>">Peminjaman buku</a>
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
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Picture Section -->
                        <div class="profile-card">
                            <div class="profile-pic">
                                <?php if (isset($buku['Foto'])): ?>
                                    <img class="detailbuku" src="<?= base_url('foto/' . $buku['Foto']); ?>">
                                <?php else: ?>
                                    <p>Foto tidak tersedia</p>
                                <?php endif; ?>
                                <div class="form-group">
                                </div>
                            </div>
                            <div class="profile-details">
                                <div class="intro">
                                    <h2 class="nama">
                                        <?= $buku['Judul'] ?>
                                    </h2>
                                    <h5>
                                        <?= $buku['Penulis'] ?>
                                    </h5>
                                </div>

                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <!----about section ----->

                <div class="col-md-8">
                    <!-- Form Section -->
                    <div class="about">
                        <h2 style="font-weight:600; font-size:30px; color:black;">DETAIL BUKU</h2>

                        <!-- Form 1 -->
                        <div class="input-group">
                            <span class="input-group-text">BUKU ID :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="bukuID" id="bukuID"
                                value="<?= $buku['bukuID'] ?>" readonly>
                            <button class="btn btn-primary" style="margin-bottom:10px;" onclick="salinBukuID()">salin
                                buku ID</button>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Penulis :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="Penulis" id="Penulis"
                                value="<?= $buku['Penulis'] ?>" readonly>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Penerbit :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="Penerbit" id="Penerbit"
                                value="<?= $buku['Penerbit'] ?>" readonly>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Jumlah halaman :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="JumlahHalaman" id="JumlahHalaman"
                                value="<?= $buku['JumlahHalaman'] ?>" readonly>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Bahasa Buku :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="email" id="email"
                                value="<?= $buku['Bahasa'] ?>" readonly>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Tahun Terbit :</span>
                            <input type="text" class="form-control" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" name="email" id="email"
                                value="<?= $buku['TahunTerbit'] ?>" readonly>
                        </div>

                        <!-- Additional form elements go here -->
                    </div>

                    <!-- Add some spacing or a separator between the forms -->

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


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>



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
    <script>
        function salinBukuID() {
            // Mengambil elemen input berdasarkan ID
            var inputBukuID = document.getElementById('bukuID');

            // Memilih teks dalam elemen input
            inputBukuID.select();
            inputBukuID.setSelectionRange(0, 99999); // Untuk mendukung peramban yang berbeda

            // Menyalin teks ke clipboard
            document.execCommand('copy');

            // Menampilkan notifikasi SweetAlert2
            Swal.fire({
                title: "Buku ID berhasil Di salin!",
                text: 'Buku ID: ' + inputBukuID.value,
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                // Menutup notifikasi setelah tombol "OK" diklik
                if (result.isConfirmed) {
                    Swal.close();
                }
            });

        }

    </script>


</body>

</html>