<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Guy 2021</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

    <!-- 
    - custom css link
    
  -->

    <link rel="stylesheet" href="<?= base_url('assetsDetail/') ?>/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/detailUser.css') ?>">

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="#top">


    <main>
        <article>

            <!-- 
        - #MOVIE DETAIL
      -->

            <section class="movie-detail">
                <div class="container">

                    <figure class="movie-detail-banner">

                        <div class="detail">
                            <?php if (isset($buku['Foto'])): ?>
                                <img class="detailbuku" src="<?= base_url('foto/' . $buku['Foto']); ?>">
                            <?php else: ?>
                                <p>Foto tidak tersedia</p>
                            <?php endif; ?>
                            <div class="form-group">
                            </div>

                    </figure>

                    <div class="movie-detail-content">

                        <p class="kategori">
                            judul buku
                        </p>

                        <h1 class="judul">
                            <?= $buku['Judul'] ?>
                        </h1>
                        <!-- <div class="meta-wrapper">
                            <p class="kategoriSmall">kategori : </p>
                            <div class="kateg">
                                <?= $buku['Kategori'] ?>
                            </div>
                            <p class="kategoriSmall">Penulis : </p>
                            <div class="kateg">
                                <?= $buku['Penulis'] ?>
                            </div>
                            <p class="kategoriSmall">Penerbit : </p>
                            <div class="kateg">
                                <?= $buku['Penerbit'] ?>
                            </div>
                            <p class="kategoriSmall">TahunTerbit : </p>
                            <div class="kateg">
                                <?= $buku['TahunTerbit'] ?>
                            </div>
                        </div>
                        <div class="kanan">
                            <p class="kategoriSmall">Jumlah Buku : </p>
                            <div class="kateg">
                                <?= $buku['Jumlah'] ?>
                            </div>
                        </div> -->
                        <div class="list-container">
                            <ul>
                                <li class="kategoriSmall">Buku ID :
                                    <p>
                                        <?= $buku['bukuID'] ?>
                                    </p>
                                </li>
                                <li class="kategoriSmall">Kategori :
                                    <p>
                                        <?= $buku['Kategori'] ?>
                                    </p>
                                </li>
                                <li class="kategoriSmall"> Penerbit :
                                    <p>
                                        <?= $buku['Penerbit'] ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="list-container">
                            <ul>
                                <li class="kategoriSmall">Bahasa :
                                    <p>
                                        <?= $buku['Bahasa'] ?>
                                    </p>
                                </li>
                                <li class="kategoriSmall"> Penulis :
                                    <p>
                                        <?= $buku['Penulis'] ?>
                                    </p>
                                </li>
                            </ul>

                        </div>
                        <div class="list-container">
                            <ul>
                                <li class="kategoriSmall">Tahun Terbit :
                                    <p>
                                        <?= $buku['TahunTerbit'] ?>
                                    </p>
                                </li>
                                <li class="kategoriSmall"> Jumlah Halaman :
                                    <p>
                                        <?= $buku['JumlahHalaman'] ?>
                                    </p>
                                </li>
                            </ul>

                        </div>


                        <p class="storyline">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores excepturi est nesciunt
                            iste, dolore eius praesentium suscipit explicabo culpa obcaecati adipisci odio laboriosam
                            sunt ipsa, facere quam, ad amet voluptates.
                        </p>

                        <div class="details-actions">

                            <button class="bagi">
                                <i class="fa-duotone fa-bookmark"></i>

                                <span>Share</span>
                            </button>

                            <div class="title-wrapper">
                                <p class="title">Pintar Literasi</p>

                                <p class="text">Perpustakaan Online</p>
                            </div>
                            <a href="<?= base_url('user') ?>">

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-backward"></i>

                                    <span>Kembali</span>
                                </button>
                            </a>

                        </div>


                    </div>

                </div>
            </section>





            <!-- 
        - #TV SERIES
      -->



        </article>
    </main>





    <!-- 
    - #FOOTER
  -->

    <footer class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="footer-bottom">
                    <div class="container">
                        <p class="copyright">
                            &copy; 2024 <a href="#">Pintar Literasi</a>. All Rights Reserved
                        </p>
                    </div>
                </div>

    </footer>





    <!-- 
    - #GO TO TOP
  -->

    <a href="#top" class="go-top" data-go-top>
        <ion-icon name="chevron-up"></ion-icon>
    </a>





    <!-- 
    - custom js link
  -->
    <script src="<?= base_url('assetsDetail/') ?>/js/script.js"></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>