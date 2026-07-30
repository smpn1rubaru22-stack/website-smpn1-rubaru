<?php
require_once "config/koneksi.php";

// Pagination
$batas = 6;

$halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;

if($halaman < 1){
    $halaman = 1;
}

$mulai = ($halaman - 1) * $batas;

// Hitung jumlah berita
$totalData = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM berita")
);

$totalHalaman = ceil($totalData / $batas);

// Ambil berita
$query = mysqli_query($conn,
"SELECT * FROM berita
ORDER BY tanggal DESC
LIMIT $mulai,$batas");
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
    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'berita.php' || basename($_SERVER['PHP_SELF']) == 'detail.php' ? 'active' : ''; ?>" href="berita.php">
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

<section class="header-berita" style="padding-top:90px; padding-bottom:50px;">>

    <div class="container">

        <h1>Berita</h1>

        <p>Informasi terbaru SMP Negeri 1 Rubaru</p>

    </div>

</section>
<!-- ================= DAFTAR BERITA ================= -->

<section class="container" style="padding-top:5px; padding-bottom:50px;">

<div class="berita-list">

<?php while($row = mysqli_fetch_assoc($query)) : ?>

<div class="berita-item">

    <div class="berita-img">
        <img src="upload/berita/<?= $row['gambar1']; ?>"
             alt="<?= htmlspecialchars($row['judul']); ?>">
    </div>

    <div class="berita-content">

        <small class="tanggal-berita">
            <i class="fa-solid fa-calendar-days"></i>
            <?= date('d F Y', strtotime($row['tanggal'])); ?>
        </small>

        <h3 class="judul-berita">
            <?= htmlspecialchars($row['judul']); ?>
        </h3>

        <p class="ringkasan-berita">
            <?= mb_substr(strip_tags($row['isi']),0,220); ?>...
        </p>

        <a href="detail.php?slug=<?= $row['slug']; ?>" class="btn-baca">
            READ MORE
        </a>

    </div>

</div>

<?php endwhile; ?>

</div>

<nav class="mt-5">

<ul class="pagination justify-content-center">

<?php for($i=1;$i<=$totalHalaman;$i++) : ?>

<li class="page-item <?= ($halaman==$i)?'active':''; ?>">
    <a class="page-link" href="?hal=<?= $i; ?>">
        <?= $i; ?>
    </a>
</li>

<?php endfor; ?>

</ul>

</nav>

</section>
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

</body>
</html>
