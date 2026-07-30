<?php
include "config/koneksi.php";

// Kepala Sekolah
$query = mysqli_query($conn, "SELECT * FROM kepala_sekolah LIMIT 1");
$kepsek = mysqli_fetch_assoc($query);

// Visi Misi
$queryVisi = mysqli_query($conn, "SELECT * FROM visi_misi LIMIT 1");
$visimisi = mysqli_fetch_assoc($queryVisi);

// Data Guru & TU
$pegawai = mysqli_query($conn, "SELECT * FROM pegawai ORDER BY nama ASC");

//struktur Organisasi
$struktur = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM struktur_organisasi LIMIT 1")
);

?>

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
    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'profil.php' 
    || basename($_SERVER['PHP_SELF']) == 'detail.php' ? 'active' : ''; ?>" href="profil.php">
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

<!-- ================= HEADER PROFIL ================= -->

<section class="profil-header py-5">

    <div class="container">

        <div class="row align-items-center">

            <!-- KOLOM KIRI -->
            <div class="col-lg-6 text-center mb-4">

                <img src="upload/kepsek/<?= $kepsek['foto']; ?>"
     class="img-fluid rounded shadow-lg"
     alt="<?= $kepsek['nama']; ?>">

                <div class="kepala-sekolah mt-4">

                    <h5 class="fw-bold text-primary mb-1">
    <?= $kepsek['jabatan']; ?>
</h5>

                    <strong><?= $kepsek['nama']; ?></strong>

                </div>

            </div>

            <!-- KOLOM KANAN -->
            <div class="col-lg-6 ps-lg-5">

                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    PROFIL SEKOLAH
                </span>

                <h1 class="display-4 fw-bold text-primary">

                    Selamat Datang di
                    <br>
                    SMP Negeri 1 Rubaru

                </h1>

                <p class="profil-deskripsi mt-4">
<?= nl2br($kepsek['sambutan']); ?>
</p>

                <button id="btnVisiMisi" class="btn btn-primary btn-lg mt-3">
                     Lihat Visi & Misi
                </button>
                

            </div>

        </div>

    </div>

</section>

<!-- ================= VISI MISI ================= -->

<section id="visiMisi" class="profil-hidden">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">

                VISI & MISI

            </h2>

            <p class="text-muted">

                Landasan dalam mewujudkan pendidikan yang berkualitas, berkarakter, dan berprestasi.

            </p>

        </div>

        <!-- VISI -->

        <div class="visi-box mb-5">

            <h3 class="text-center mb-4">

                <i class="fas fa-eye text-warning"></i>

                VISI

            </h3>

            <p class="text-center">
    <strong>
        <?= htmlspecialchars($visimisi['visi']); ?>
    </strong>
</p>

        </div>

        <!-- MISI -->

        <div class="misi-box">

            <h3 class="mb-4">

                <i class="fas fa-bullseye text-primary"></i>

                MISI

            </h3>

           <ul class="misi-list">

<?php
$misi = preg_split('/\r\n|\r|\n/', $visimisi['misi']);

foreach ($misi as $item) {

    if(trim($item)!=""){

        echo "<li>".htmlspecialchars(trim($item))."</li>";

    }

}
?>

</ul>

        </div>

    </div>

</section>

<!-- ================= GURU & TENAGA KEPENDIDIKAN ================= -->

<section class="guru-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">
                Guru & Tenaga Kependidikan
            </h2>

            <p class="text-muted">
                SMP Negeri 1 Rubaru
            </p>

        </div>

        <div class="guru-slider">

            

                <div class="guru-track">

<?php while($row = mysqli_fetch_assoc($pegawai)){ ?>

    <div class="guru-card">

        <img src="upload/pegawai/<?= htmlspecialchars($row['foto']); ?>"
             alt="<?= htmlspecialchars($row['nama']); ?>">

        <h5><?= htmlspecialchars($row['nama']); ?></h5>

        <p><?= htmlspecialchars($row['jabatan']); ?></p>

    </div>

<?php } ?>

</div>
</section>

</section>

<!-- STRUKTUR ORGANISASI -->
<section class="struktur-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Struktur Organisasi
            </h2>

            <p class="text-muted">
                SMP Negeri 1 Rubaru
            </p>

        </div>

        <div class="text-center">

            <?php if(!empty($struktur['gambar'])){ ?>

<img
    src="upload/struktur/<?= htmlspecialchars($struktur['gambar']); ?>"
    class="img-fluid struktur-img"
    alt="Struktur Organisasi">

<?php }else{ ?>

<div class="alert alert-warning text-center">
    Gambar struktur organisasi belum tersedia.
</div>

<?php } ?>

        </div>

    </div>

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

<script src="assets/js/script.js"></script>

</body>
<html>
