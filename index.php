<?php
require_once "config/koneksi.php";

$queryBerita = mysqli_query($conn,
"SELECT * FROM berita ORDER BY tanggal DESC LIMIT 5");

$semuaBerita = mysqli_fetch_all($queryBerita, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMP Negeri 1 Rubaru</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

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
    <a class="nav-link <?= $halaman == 'index.php' ? 'active' : ''; ?>" href="index.php">
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

                    <a class="nav-link"
                       href="kontak.php">

                        Kontak

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>

<!-- ================= SLIDER ================= -->

<div id="carouselSekolah"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="5000"
     data-bs-wrap="true"
     data-bs-pause="false">
    <div class="carousel-indicators">

    <button type="button"
            data-bs-target="#carouselSekolah"
            data-bs-slide-to="0"
            class="active"></button>

    <button type="button"
            data-bs-target="#carouselSekolah"
            data-bs-slide-to="1"></button>

    <button type="button"
            data-bs-target="#carouselSekolah"
            data-bs-slide-to="2"></button>

</div>
<div class="carousel-inner">

<div class="carousel-item active">

<img src="assets/img/slider1.jpg"
class="d-block w-100 slider-img">

<div class="carousel-caption">

<h1>Selamat Datang</h1>

<p>Website Resmi SMP Negeri 1 Rubaru</p>

<a href="profil.php"
class="btn btn-warning btn-lg">

Lihat Profil

</a>

</div>

</div>

<div class="carousel-item">

<img src="assets/img/slider2.jpg"
class="d-block w-100 slider-img">

<div class="carousel-caption">

<h1>Sekolah Ramah Anak</h1>

<p>Mewujudkan Peserta Didik Berkarakter</p>

</div>

</div>

<div class="carousel-item">

<img src="assets/img/slider3.jpg"
class="d-block w-100 slider-img">

<div class="carousel-caption">

<h1>Prestasi & Inovasi</h1>

<p>Bersama Meraih Masa Depan Gemilang</p>

</div>

</div>

</div>

<button class="carousel-control-prev"
type="button"
data-bs-target="#carouselSekolah"
data-bs-slide="prev">

<span class="carousel-control-prev-icon"></span>

</button>

<button class="carousel-control-next"
type="button"
data-bs-target="#carouselSekolah"
data-bs-slide="next">

<span class="carousel-control-next-icon"></span>

</button>

</div>

<!-- ================= BERITA ================= -->

<!-- BERITA TERKINI -->
<section class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <small class="text-primary fw-bold">TERBARU</small>
            <h2 class="fw-bold">Berita Sekolah</h2>
        </div>

        <a href="berita.php" class="text-decoration-none">
            Lihat Semua →
        </a>

    </div>

    <div class="row">

        <!-- BERITA UTAMA -->
<?php if (!empty($semuaBerita)) : ?>

<div class="col-lg-8">

    <div class="card border-0 shadow">

        <img src="upload/berita/<?= htmlspecialchars($semuaBerita[0]['gambar1']); ?>"
             class="card-img-top berita-utama"
             alt="<?= htmlspecialchars($semuaBerita[0]['judul']); ?>">

        <div class="card-body">

            <h3 class="mt-3 text-primary fw-bold">
                <?= htmlspecialchars($semuaBerita[0]['judul']); ?>
            </h3>

            <p class="text-muted">
                <?= date('d F Y', strtotime($semuaBerita[0]['tanggal'])); ?>
            </p>

            <p>
                <?= mb_substr(strip_tags($semuaBerita[0]['isi']), 0, 250); ?>...

                <a href="detail.php?slug=<?= htmlspecialchars($semuaBerita[0]['slug']); ?>">
                    Baca Selengkapnya →
                </a>
            </p>

        </div>

    </div>

</div>

<?php else : ?>

<div class="col-lg-8">
    <div class="alert alert-info">
        Belum ada berita yang dipublikasikan.
    </div>
</div>

<?php endif; ?>

     <!-- BERITA LAINNYA -->
    <div class="col-lg-4">

<?php
for ($i = 1; $i < count($semuaBerita); $i++) :
?>

    <div class="berita-kecil mb-3">

        <img src="upload/berita/<?= htmlspecialchars($semuaBerita[$i]['gambar1']); ?>"
             alt="<?= htmlspecialchars($semuaBerita[$i]['judul']); ?>">

        <div>

            <small class="text-primary">
                <?= date('d M Y', strtotime($semuaBerita[$i]['tanggal'])); ?>
            </small>

            <h6>
                <?= htmlspecialchars($semuaBerita[$i]['judul']); ?>
            </h6>

            <a href="detail.php?slug=<?= htmlspecialchars($semuaBerita[$i]['slug']); ?>">
                Baca Selengkapnya →
            </a>

        </div>

    </div>

<?php endfor; ?>

</div>

</section>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>