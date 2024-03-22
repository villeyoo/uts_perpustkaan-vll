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


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

</head>

<body>




    <!--
    - main container
  -->
    <div class="container">

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

                        <li> <a href="#" class="navbar-link indicator">Beranda</a> </li>
                        <li> <a href="#category" class="navbar-link">Kategori</a> </li>
                        <li> <a href="<?= base_url('user/profile') ?>" class="navbar-link">Profile</a> </li>
                        <li class="dropdown" onclick="toggleDropdown()">
                            <a href="#" class="navbar-link">Transaksi</a>
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
        <main>

            <!--
        - #BANNER SECTION
      -->
            <section class="banner">
                <div class="banner-card">

                    <img src="<?= base_url('assets/') ?>images/user.jpg" class="banner-img" alt="">

                    <div class="card-content">

                    </div>

                </div>
                <div>
                    <?php
                    if (!empty($buku)) {
                        foreach ($buku as $bk):
                            // Your existing code for displaying search results
                        endforeach;
                    } else {
                        echo "<h1 style='color: red; text-align: center; margin-top: 60px;'>Yahh Buku tidak ditemukan.</h1>";
                    }
                    ?>


                </div>
            </section>





            <!--
        - #MOVIES SECTION
      -->
            <section class="movies">

                <!--
          - filter bar
        -->
                <div class="filter-bar">

                    <?php
                    $totalBooks = isset($_SESSION['totalBooks']) ? $_SESSION['totalBooks'] : 0;
                    ?>
                    <div class="buku">
                        <p class="mb-2">BUKU TERSEDIA :</p>
                        <h4 class="counter">
                            <?= $totalBooks; ?>
                        </h4>
                    </div>
                    <div class="filter-radios">
                        <h5 class="main-title"> HALLO APA KABAR
                            <?= isset($user['name']) ? strtoupper($user['name']) : 'Tidak ada nama'; ?> ?
                        </h5>
                    </div>
                </div>


                <!--
          - movies grid
        -->
                <div class="movies-grid">
                    <?php
                    $totalBooks = 0; // Variabel untuk menyimpan jumlah buku
                    foreach ($buku as $bk):
                        $totalBooks++;

                        ?>
                        <div class="movie-card">

                            <div class="card-head">
                                <img src="<?= base_url('foto/' . $bk->Foto); ?>" class="card-image">

                                <div class="card-overlay">
                                    <div class="rating">
                                        <i class="fa-duotone fa-calendar"></i>
                                        <span>
                                            <?php echo $bk->TahunTerbit ?>
                                        </span>
                                    </div>

                                    <div class="play">
                                        <a href="<?= base_url('user/detail/' . $bk->bukuID); ?>">
                                            <button class="text">Detail</button>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body">
                                <h5>
                                    <?php echo strtoupper($bk->Judul); ?>
                                </h5>

                                <div class="card-info">
                                    <span>
                                        <?php echo $bk->Kategori ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <?php
                    endforeach;
                    $_SESSION['totalBooks'] = $totalBooks;
                    ?>




            </section>






            <!--
        - #CATEGORY SECTION
      -->
            <section class="category" id="category">

                <h2 class="section-heading">Category</h2>

                <div class="category-grid">

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/action.jpg" alt="" class="card-img">
                        <div class="name">Action</div>
                        <div class="total">100</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/comedy.jpg" alt="" class="card-img">
                        <div class="name">Comedy</div>
                        <div class="total">50</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/thriller.webp" alt="" class="card-img">
                        <div class="name">Thriller</div>
                        <div class="total">20</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/horror.jpg" alt="" class="card-img">
                        <div class="name">Horror</div>
                        <div class="total">80</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/adventure.jpg" alt="" class="card-img">
                        <div class="name">Adventure</div>
                        <div class="total">100</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/animated.jpg" alt="" class="card-img">
                        <div class="name">Animated</div>
                        <div class="total">50</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/crime.jpg" alt="" class="card-img">
                        <div class="name">Crime</div>
                        <div class="total">20</div>
                    </div>

                    <div class="category-card">
                        <img src="<?= base_url('assetsUser/') ?>images/sci-fi.jpg" alt="" class="card-img">
                        <div class="name">SCI-FI</div>
                        <div class="total">80</div>
                    </div>

                </div>

            </section>





            <!--
        - #LIVE SECTION
      -->
            <section class="live" id="live">

                <h2 class="section-heading">Live Tv Shows</h2>

                <div class="live-grid">

                    <div class="live-card">

                        <div class="card-head">
                            <img src="<?= base_url('assetsUser/') ?>images/planet.jpg" alt="" class="card-img">
                            <div class="live-badge">LIVE</div>
                            <div class="total-viewers">305K viewers</div>
                            <div class="play">
                                <ion-icon name="play-circle-outline"></ion-icon>
                            </div>
                        </div>

                        <div class="card-body">
                            <img src="<?= base_url('assetsUser/') ?>images/bbcamerica.jpg" alt="" class="avatar">
                            <h3 class="card-title">Planet Earth II <br> Season 1 - Islands</h3>
                        </div>

                    </div>

                    <div class="live-card">

                        <div class="card-head">
                            <img src="<?= base_url('assetsUser/') ?>images/got.jpg" alt="" class="card-img">
                            <div class="live-badge">LIVE</div>
                            <div class="total-viewers">1.7M viewers</div>
                            <div class="play">
                                <ion-icon name="play-circle-outline"></ion-icon>
                            </div>
                        </div>

                        <div class="card-body">
                            <img src="<?= base_url('assetsUser/') ?>images/HBO-Logo-square.jpg" alt="" class="avatar">
                            <h3 class="card-title">Game of Thrones <br> Season 5 - Mother's Mercy</h3>
                        </div>

                    </div>

                    <div class="live-card">

                        <div class="card-head">
                            <img src="<?= base_url('assetsUser/') ?>images/vikins.jpg" alt="" class="card-img">
                            <div class="live-badge">LIVE</div>
                            <div class="total-viewers">468K viewers</div>
                            <div class="play">
                                <ion-icon name="play-circle-outline"></ion-icon>
                            </div>
                        </div>

                        <div class="card-body">
                            <img src="<?= base_url('assetsUser/') ?>images/HBO-Logo-square.jpg" alt="" class="avatar">
                            <h3 class="card-title">Vikings <br> Season 4 - What Might Have Been</h3>
                        </div>

                    </div>

                </div>

            </section>

        </main>

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

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>W