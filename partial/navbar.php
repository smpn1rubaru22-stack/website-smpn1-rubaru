<?php

if (!isset($conn)) {
    require_once __DIR__ . "/../config/koneksi.php";
}

$navbar = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM navbar LIMIT 1")
);

$halaman = basename($_SERVER['PHP_SELF']);
?>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">

    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">

    <img src="upload/logo/<?= $navbar['logo']; ?>"
         width="50"
         class="me-4">

    <div>
        <h6 class="mb-0 fw-bold"><?= $navbar['nama_website']; ?></h6>
        <small><?= $navbar['subjudul']; ?></small>
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
                    <a class="nav-link <?= $halaman=='index.php'?'active':''; ?>"
                       href="index.php">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $halaman=='profil.php'?'active':''; ?>"
                       href="profil.php">
                        Profil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $halaman=='fasilitas.php'?'active':''; ?>"
                       href="fasilitas.php">
                        Fasilitas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= in_array($halaman,['berita.php','detail.php'])?'active':''; ?>"
                       href="berita.php">
                        Berita
                    </a>
                </li>

                <!-- Dropdown Pelayanan -->
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle-custom <?= in_array($halaman,['pelayanan.php','pengaduan.php'])?'active':''; ?>"
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
                            <a class="dropdown-item"
                               href="pelayanan.php">

                                <i class="fa-solid fa-list-check me-2"></i>

                                Standar Pelayanan

                            </a>
                        </li>

                        <li>

                            <a class="dropdown-item"
                               href="pengaduan.php">

                                <i class="fa-solid fa-comments me-2"></i>

                                Layanan Pengaduan

                            </a>

                        </li>

                    </ul>

                </li>

                <li class="nav-item">

                    <a class="nav-link <?= $halaman=='kontak.php'?'active':''; ?>"
                       href="kontak.php">

                        Kontak

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>