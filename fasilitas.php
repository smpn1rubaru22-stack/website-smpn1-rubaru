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
        <a class="navbar-brand d-flex align-items-center" href="index.html">

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
    <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'fasilitas.php' 
    || basename($_SERVER['PHP_SELF']) == 'detail.php' ? 'active' : ''; ?>" href="fasilitas.php">
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

                <!-- Menu Pelayanan -->
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

<!-- ================= HEADER FASILITAS ================= -->

<section class="fasilitas-header">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <img src="assets/img/fasilitas-header.jpg"
                     class="img-fluid fasilitas-cover">

            </div>

            <div class="col-lg-6">

                <small class="judul-fasilitas">

                    FASILITAS

                </small>

                <h1>

                    SMP Negeri 1 Rubaru

                </h1>

                <p>

                    SMP Negeri 1 Rubaru menyediakan berbagai fasilitas
                    yang nyaman dan lengkap untuk menunjang kegiatan
                    belajar mengajar serta pengembangan potensi peserta didik.

                </p>

                <button
                    id="btnFasilitas"
                    class="btn btn-primary btn-lg">

                    Jelajahi Fasilitas

                </button>

            </div>

        </div>

    </div>

</section>



<!-- ================= DAFTAR FASILITAS ================= -->

<section id="daftarFasilitas" class="fasilitas-list">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">

                Daftar Fasilitas

            </h2>

            <p class="text-muted">

                Sarana dan prasarana SMP Negeri 1 Rubaru

            </p>

        </div>

        <div class="row g-4">

            <!-- FASILITAS 1 -->

            <div class="col-lg-3">

                <div class="fasilitas-card">

                    <img src="assets/img/kelas.jpg">

                    <div class="p-3">

                        <h5>Ruang Kelas</h5>

                        <p>
                            Ruang belajar yang nyaman dan representatif.
                        </p>

                    </div>

                </div>

            </div>

            <!-- FASILITAS 2 -->

            <div class="col-lg-3">

                <div class="fasilitas-card">

                    <img src="assets/img/aula.jpg">

                    <div class="p-3">

                        <h5>Ruang Aula</h5>

                        <p>
                            Digunakan untuk berbagai kegiatan sekolah.
                        </p>

                    </div>

                </div>

            </div>

            <!-- FASILITAS 3 -->

            <div class="col-lg-3">

                <div class="fasilitas-card">

                    <img src="assets/img/perpustakaan.jpg">

                    <div class="p-3">

                        <h5>Perpustakaan</h5>

                        <p>
                            Menumbuhkan budaya literasi peserta didik.
                        </p>

                    </div>

                </div>

            </div>

            <!-- FASILITAS 4 -->

            <div class="col-lg-3">

                <div class="fasilitas-card">

                    <img src="assets/img/lab.jpg">

                    <div class="p-3">

                        <h5>Laboratorium IPA</h5>

                        <p>
                            Mendukung kegiatan praktikum siswa.
                        </p>

                    </div>

                </div>

            </div>
            <!-- 5. LAB KOMPUTER -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/lab-komputer.jpg" alt="Lab Komputer">

        <div class="p-3">

            <h5>Laboratorium Komputer</h5>

            <p>
                Fasilitas komputer yang mendukung pembelajaran informatika dan literasi digital peserta didik.
            </p>

        </div>

    </div>

</div>

<!-- 6. RUANG MULTIMEDIA -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/multimedia.jpg" alt="Ruang Multimedia">

        <div class="p-3">

            <h5>Ruang Multimedia</h5>

            <p>
                Digunakan sebagai ruang pembelajaran berbasis teknologi dan media interaktif.
            </p>

        </div>

    </div>

</div>

<!-- 7. MUSHOLA -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/mushola.jpg" alt="Musholla">

        <div class="p-3">

            <h5>Mushola</h5>

            <p>
                Tempat ibadah yang nyaman untuk meningkatkan keimanan dan ketakwaan seluruh warga sekolah.
            </p>

        </div>

    </div>

</div>

<!-- 8. KAMAR MANDI -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/kamar-mandi.jpg" alt="Kamar Mandi">

        <div class="p-3">

            <h5>Kamar Mandi</h5>

            <p>
                Fasilitas sanitasi yang bersih dan terawat untuk mendukung kenyamanan peserta didik.
            </p>

        </div>

    </div>

</div>

<!-- 9. AREA PARKIR -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/parkir.jpg" alt="Parkir">

        <div class="p-3">

            <h5>Area Parkir</h5>

            <p>
                Area parkir yang luas dan aman bagi kendaraan guru, tenaga kependidikan, dan tamu.
            </p>

        </div>

    </div>

</div>

<!-- 10. RUANG GURU -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/ruang-guru.jpg" alt="Ruang Guru">

        <div class="p-3">

            <h5>Ruang Guru</h5>

            <p>
                Tempat guru merencanakan pembelajaran, berdiskusi, dan melaksanakan administrasi pendidikan.
            </p>

        </div>

    </div>

</div>

<!-- 11. RUANG STAFF TU -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/staff-tu.jpg" alt="Staff TU">

        <div class="p-3">

            <h5>Ruang Tata Usaha</h5>

            <p>
                Pusat pelayanan administrasi sekolah yang melayani kebutuhan warga sekolah dan masyarakat.
            </p>

        </div>

    </div>

</div>

<!-- 12. RUANG BK -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/bk.jpg" alt="Ruang BK">

        <div class="p-3">

            <h5>Ruang BK</h5>

            <p>
                Tempat layanan bimbingan dan konseling untuk membantu perkembangan peserta didik.
            </p>

        </div>

    </div>

</div>

<!-- 13. RUANG KEPALA SEKOLAH -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/kepsek.jpg" alt="Ruang Kepala Sekolah">

        <div class="p-3">

            <h5>Ruang Kepala Sekolah</h5>

            <p>
                Ruang kerja kepala sekolah sebagai pusat koordinasi, kepemimpinan, dan pengambilan keputusan.
            </p>

        </div>

    </div>

</div>

<!-- 14. LAPANGAN -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/lapangan.jpg" alt="Lapangan">

        <div class="p-3">

            <h5>Lapangan Sekolah</h5>

            <p>
                Digunakan untuk kegiatan olahraga, upacara bendera, dan berbagai kegiatan sekolah lainnya.
            </p>

        </div>

    </div>

</div>

<!-- 15. PANGGUNG KREATIVITAS -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/panggung.jpg" alt="Panggung Kreativitas">

        <div class="p-3">

            <h5>Panggung Kreativitas</h5>

            <p>
                Sarana bagi peserta didik untuk menampilkan bakat, seni, dan kreativitas dalam berbagai kegiatan.
            </p>

        </div>

    </div>

</div>

<!-- 16. KANTIN -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/kantin.jpg" alt="Kantin">

        <div class="p-3">

            <h5>Kantin Sekolah</h5>

            <p>
                Menyediakan makanan dan minuman yang bersih, sehat, serta mendukung pola hidup sehat peserta didik.
            </p>

        </div>

    </div>

</div>

<!-- 17. UKS -->
<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">

        <img src="assets/img/uks.jpg" alt="UKS">

        <div class="p-3">

            <h5>UKS</h5>

            <p>
                Unit Kesehatan Sekolah yang memberikan pelayanan kesehatan dasar dan pertolongan pertama.
            </p>

        </div>

    </div>

</div>

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
</html>