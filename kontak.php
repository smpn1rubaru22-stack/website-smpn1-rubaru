<!DOCTYPE html>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php
$halaman = basename($_SERVER['PHP_SELF']);
?>
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

                <li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle-custom"
       href="#"
       id="navbarPelayanan"
       role="button"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        Pelayanan

        <i class="fa-solid fa-chevron-down ms-1"></i>

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
    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'kontak.php' 
    || basename($_SERVER['PHP_SELF']) == 'detail.php' ? 'active' : ''; ?>" href="kontak.php">
        Kontak
    </a>
</li>

            </ul>

        </div>

    </div>

</nav>
<section class="hero-kontak">
    <h1>Kontak</h1>
    <p>Hubungi SMP Negeri 1 Rubaru</p>
</section>


<section class="kontak-section">

    <div class="kontak-info">

        <div class="kontak-item">
            <div class="icon">📍</div>
            <div>
                <h3>Alamat</h3>
                <p>
                    Jl. Raya Rubaru<br>
                    Kabupaten Sumenep, Jawa Timur
                </p>
            </div>
        </div>


        <div class="kontak-item">
            <div class="icon">☎</div>
            <div>
                <h3>Telepon</h3>
                <p>+62851-3036-8280</p>
            </div>
        </div>


        <div class="kontak-item">
            <div class="icon">✉</div>
            <div>
                <h3>Email</h3>
                <p>smpn1.rubaru21@gmail.com</p>
            </div>
        </div>


        <div class="kontak-item">
            <div class="icon">⏰</div>
            <div>
                <h3>Jam Pelayanan</h3>
                <p>
                    Senin - Kamis : 07.30 - 13.00 WIB<br>
                    Jumat : 07.30 - 10.30 WIB
                </p>
            </div>
        </div>


        <h3 class="judul-sosmed">
            Media Sosial
        </h3>

        <div class="social">

            <a href="https://www.instagram.com/smpn1rubaru">
                Instagram
            </a>

            <a href="https://tiktok.com/@smpn1.rubaru">
                TikTok
            </a>

            <a href="#">
                YouTube
            </a>

        </div>

    </div>



    <div class="maps">

        <iframe 
        src="https://maps.google.com/maps?q=SMP%20Negeri%201%20Rubaru&t=&z=15&ie=UTF8&iwloc=&output=embed"
        width="100%"
        height="350"
        style="border:0;"
        loading="lazy">
        </iframe>

    </div>


</section>
<!-- ================= FOOTER ================= -->
<footer class="footer mt-5">

    <div class="container">

        <div class="row gy-4 align-items-start">
             <div class="text-center">

            © 2026 SMP Negeri 1 Rubaru | All Rights Reserved

        </div>

    </div>

</footer>
</body>
</html>