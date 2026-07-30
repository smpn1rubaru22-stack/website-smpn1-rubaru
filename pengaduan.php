!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil | SMP Negeri 1 Rubaru</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">

            <img src="assets/img/logo.png"
                 width="50"
                 class="me-2">

            <div>

                <h6 class="mb-0 fw-bold">
                    SMP Negeri 1 Rubaru
                </h6>

                <small>
                    Kabupaten Sumenep
                </small>

            </div>

        </a>

        <!-- Toggle -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSekolah">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse"
             id="navbarSekolah">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link"
                       href="index.php">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="profil.php">
                        Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="fasilitas.php">
                        Fasilitas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="berita.php">
                        Berita
                    </a>
                </li>

                <!-- Dropdown Pelayanan -->

                <?php
$halaman = basename($_SERVER['PHP_SELF']);
?>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle <?= in_array($halaman, ['pelayanan.php','pengaduan.php']) ? 'active' : ''; ?>"
       href="#"
       data-bs-toggle="dropdown">

        Pelayanan

    </a>

    <ul class="dropdown-menu shadow">

        <li>
            <a class="dropdown-item" href="pelayanan.php">
                <i class="fa-solid fa-list-check me-2"></i>
                Standar Pelayanan
            </a>
        </li>

        <li>
            <a class="dropdown-item" href="pengaduan.php">
                <i class="fa-solid fa-comments me-2"></i>
                Layanan Pengaduan
            </a>
        </li>

    </ul>
</li>

                <li class="nav-item">

                    <a class="nav-link"
                       href="kontak.php">

                        Kontak

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<div class="layanan-detail">


    <!-- JUDUL -->

    <h1>
        Layanan Pengaduan
    </h1>


    <div class="garis"></div>



    <!-- DESKRIPSI -->

    <p class="deskripsi-layanan">

        SMP Negeri 1 Rubaru menyediakan layanan pengaduan 
        sebagai sarana bagi masyarakat, peserta didik, orang tua,
        dan pengguna layanan dalam menyampaikan kritik, saran,
        serta masukan terkait pelayanan sekolah. etiap pengaduan yang disampaikan akan diterima,
        diverifikasi, dan ditindaklanjuti sebagai bentuk komitmen
        sekolah dalam meningkatkan kualitas pelayanan publik.

    </p>





    <!-- QR CODE -->


    <section class="qr-pengaduan">


        <h2>
            Sampaikan Pengaduan Anda
        </h2>


        <p>
            Scan QR Code berikut untuk mengisi formulir pengaduan online.
        </p>



        <img src="assets/img/qr-pengaduan.png"
             alt="QR Code Pengaduan"
             class="gambar-qr">



        <br>


        <a href="https://docs.google.com/forms/d/e/1FAIpQLSehQiWkvtovIowvfTZxrjMQkKsJOSH456omEYSWUkMJ2urGtA/viewform"
           class="btn-pengaduan">

            Isi Form Pengaduan

        </a>


    </section>






    <!-- ALUR -->

    <section class="alur-pengaduan">


        <h2>
            Alur Penanganan Pengaduan
        </h2>



        <div class="alur-box">



            <div class="alur-item">

                <span>1</span>

                <h3>
                    Penyampaian Pengaduan
                </h3>

                <p>
                    Masyarakat mengisi formulir pengaduan melalui QR Code.
                </p>

            </div>





            <div class="alur-item">

                <span>2</span>

                <h3>
                    Verifikasi
                </h3>

                <p>
                    Petugas melakukan pemeriksaan dan validasi laporan.
                </p>

            </div>





            <div class="alur-item">

                <span>3</span>

                <h3>
                    Tindak Lanjut
                </h3>

                <p>
                    Pengaduan diteruskan kepada pihak terkait untuk ditangani.
                </p>

            </div>





            <div class="alur-item">

                <span>4</span>

                <h3>
                    Penyelesaian
                </h3>

                <p>
                    Sekolah memberikan respon dan solusi atas pengaduan.
                </p>

            </div>



        </div>


    </section>





    <!-- KOMITMEN -->

    <div class="komitmen-pelayanan">


        <h2>
            Komitmen Pelayanan
        </h2>


        <p>

        SMP Negeri 1 Rubaru berkomitmen memberikan pelayanan
        yang transparan, cepat, tepat, dan bertanggung jawab
        dalam menangani setiap pengaduan.

        </p>


    </div>



</div>

  <!-- ================= FOOTER ================= -->
<footer class="footer mt-5">

    <div class="container">

        <div class="row gy-4 align-items-start">

            <!-- Logo -->
            <div class="col-lg-3 col-md-6">

                <img src="assets/img/logo.png" width="80" class="mb-3">

                <h4>SMP Negeri 1 Rubaru</h4>

                <p>
                    Mewujudkan peserta didik yang beriman,
                    berkarakter, berprestasi, dan berwawasan lingkungan.
                </p>

            </div>

            <!-- Alamat -->
            <div class="col-lg-3 col-md-6">

                <h4>Alamat</h4>

                <p>
                    Jl. Raya Rubaru<br>
                    Ds. Banasare, Kec.Rubaru<br>
                    Kab. Sumenep<br>
                    Jawa Timur
                </p>

                <p>
                    <i class="fa-solid fa-phone"></i>
                    +62851-3038-8280
                </p>

                <p>
                    <i class="fa-solid fa-envelope"></i>
                    Smpn1.rubaru21@gmail.com
                </p>

            </div>

            <!-- Media Sosial -->
            <div class="col-lg-2 col-md-6">

                <h4>Media Sosial</h4>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="https://www.instagram.com/smpn1rubaru?igsh=MWw2bmhpdTFrdmJvdQ==" target="_blank">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="https://youtube.com/@smpn1rubaru47?si=3uPGDYo9iCvbiFrI" target="_blank">
                            <i class="fab fa-youtube"></i> YouTube
                        </a>
                    </li>

                    <li>
                        <a href="https://tiktok.com/@smpn1.rubaru" target="_blank">
                            <i class="fab fa-tiktok"></i> TikTok
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Maps -->
            <div class="col-lg-4 col-md-6">

                <h4>Lokasi Sekolah</h4>

                <iframe
                    src="https://www.google.com/maps?q=SMP+Negeri+1+Rubaru&output=embed"
                    loading="lazy"
                    allowfullscreen>
                </iframe>

            </div>

        </div>

        <hr>

        <div class="text-center">

            © 2026 SMP Negeri 1 Rubaru | All Rights Reserved

        </div>

    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
<html>
