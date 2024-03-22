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
            <form action="<?= base_url('peminjaman/simpan') ?>" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Profile Picture Section -->
                            <div class="profile-card">
                                <div class="profile-pic">
                                    <img name="foto" id="Foto" alt="Tidak Ada foto | Pilih buku terlebih dahulu">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!----about section ----->

                    <div class="col-md-8">
                        <!-- Form Section -->
                        <div class="about">
                            <h2 style="font-weight:600; font-size:30px; color:black;">PEMINJAMAN</h2>

                            <!-- Form 1 -->
                            <div class="input-group">
                                <span class="input-group-text">No Transaksi :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" name="transaksi" id="transaksi"
                                    value="<?php echo $autonumber ?>" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text">Meminjam di tanggal :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" name="pinjam" id="pinjam"
                                    value="<?php echo $tglpinjam; ?>" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Kembalikan buku di tanggal :</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" name="balikin" id="balikin"
                                    value="<?php echo $tglkembali; ?>" readonly>
                            </div>

                            <div class="input-group">
                                <span class="input-group-text" style="color:black;">Nama Siswa :</span>
                                <input type="text" name="nama" id="nama" class="form-control" readonly
                                    value="<?= $user['name'] ?>">
                            </div>


                            <!-- Additional form elements go here -->

                            <p style="color:red;">
                                Jika terlambat atau hilang akan di kenakan denda!
                            </p>
                        </div>

                        <!-- Add some spacing or a separator between the forms -->
                        <div style="margin-top: 20px;"></div>

                        <!-- Form 2 -->
                        <div class="about">
                            <h2 style="font-weight:600; font-size:30px; color:black;">PILIH BUKU</h2>

                            <div class="input-group" style="margin-top:10px;">
                                <span class="input-group-text" id="inputGroup-sizing-default">Pilih buku:</span>
                                <select name="Judul" class="form-control" id="Judul" style="color:black;">
                                    <option value="">Pilih buku | masukan ID buku</option>
                                    <?php
                                    usort($yobuku, function ($a, $b) {
                                        return strcmp($a->Judul, $b->Judul);
                                    });
                                    foreach ($yobuku as $da):
                                        ?>
                                        <option value="<?php echo $da->Judul ?>">
                                            <?php echo $da->Judul ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Buku ID :</span>
                                <!-- <small style="color:red;">Jika Sudah memasukan BUKU ID tekan ENTER atau KLIK DIMANA
                                    SAJA</small> -->
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="bukuID" id="bukuID"
                                            placeholder="Masukkan ID buku" required>
                                        <div class="input-group-append">
                                            <button style="margin-bottom:12px;" class="btn btn-primary"
                                                type="button">Cari</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Penulis :</span>
                                <input type="text" class="form-control" id="Penulis" readonly="readonly">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Kategori :</span>
                                <input type="text" class="form-control" id="Kategori" readonly="readonly">
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">Penerbit :</span>
                                <input type="text" class="form-control" id="Penerbit" readonly="readonly">
                            </div>

                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus sed commodi,
                                voluptatum
                                sint iusto tempora cumque assumenda animi porro, minus perspiciatis asperiores quam
                                molestias omnis tenetur officia, ea voluptate ullam.
                            </p>
                            <button type="submit" class="btn btn-primary">PINJAM BUKU</button>

                        </div>
                    </div>
                </div>
            </form>

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

        if (saveSuccess === 'true')
            Swal.fire({
                title: "Berhasil Meminjam Buku!",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                // Menutup notifikasi setelah tombol "OK" diklik
                if (result.isConfirmed) {
                    Swal.close();
                }
            });


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
        $("#Judul").change(function () {
            var Judul = $("#Judul").val();

            $.ajax({
                url: "<?php echo site_url('peminjaman/cari_byjudul'); ?>",
                type: "POST",
                data: { Judul: Judul },
                cache: false,
                dataType: 'json',
                success: function (response) {
                    // Menyertakan bukuID, Judul, dan Penulis dalam respons
                    $("#bukuID").val(response.bukuID);
                    $("#Judul").val(response.Judul);
                    $("#Penulis").val(response.Penulis);
                    $("#Kategori").val(response.Kategori);
                    $("#Penerbit").val(response.Penerbit);

                    $("#Foto").attr("src", "<?php echo base_url('foto/'); ?>" + response.Foto);
                }
            });
        });

        $("#bukuID").change(function () {
            var bukuID = $("#bukuID").val();

            $.ajax({
                url: "<?php echo site_url('peminjaman/cari_buku'); ?>",
                type: "POST",
                data: { bukuID: bukuID },
                cache: false,
                dataType: 'json',
                success: function (response) {
                    // Menyertakan bukuID, Judul, dan Penulis dalam respons
                    $("#bukuID").val(response.bukuID);
                    $("#Judul").val(response.Judul);
                    $("#Penulis").val(response.Penulis);
                    $("#Kategori").val(response.Kategori);
                    $("#Penerbit").val(response.Penerbit);

                    $("#Foto").attr("src", "<?php echo base_url('foto/'); ?>" + response.Foto);
                }
            });
        });

    </script>
    <!-- <script>
        $("#judul").change(function () {
            var judul = $("#judul").val();

            $.ajax({
                url: "<?php echo site_url('user/getInfoBuku'); ?>",
                type: "POST",
                data: "judul=" + judul,
                cache: false,
                success: function (html) {
                    $("#penulis").val(html);
                    // document.write(html)
                }
            })

        });
    </script> -->

    <!-- <script>
        $(document).ready(function () {
            $("#buku_id").on('input', function () {
                var bukuId = $(this).val();

                // Lakukan kueri AJAX untuk mendapatkan informasi buku
                $.ajax({
                    url: "<?php echo site_url('user/getInfoBuku'); ?>",
                    type: 'POST',
                    data: { buku: bukuId }, // Perbarui nama kolom menjadi bukuID
                    dataType: 'json',
                    success: function (response) {
                        if (response) {
                            // Update nilai judul dan pengarang jika data ditemukan
                            $("#judul").val(response.judul);
                            $("#penulis").val(response.penulis);
                        } else {
                            // Beri pesan atau reset nilai jika data tidak ditemukan
                            $("#judul").val('');
                            $("#penulis").val('');
                        }
                    },
                    error: function () {
                        alert('Terjadi kesalahan saat mengambil informasi buku.');
                    }
                });
            });
        });
    </script> -->

</body>

</html>