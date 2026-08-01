<?php
include __DIR__ . "/../config/koneksi.php";

$kontak = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM kontak LIMIT 1")
);
?>

<footer class="footer">

<div class="container">

<div class="row align-items-start gy-5">

    <!-- Kolom 1 -->
    <div class="col-lg-4">

        <img src="upload/logo/<?= $kontak['logo']; ?>" class="footer-logo">

        <h3><?= $kontak['nama_website']; ?></h3>

        <div class="footer-line"></div>

        <p>
            <?= nl2br($kontak['footer_deskripsi']); ?>
        </p>

    </div>


    <!-- Kolom 2 -->
    <div class="col-lg-3">

        <h3>Kontak</h3>

        <div class="footer-line"></div>

        <div class="footer-item">
            <i class="fas fa-map-marker-alt"></i>

            <span>
                <?= nl2br($kontak['alamat']); ?>
            </span>
        </div>

        <div class="footer-item">
            <i class="fas fa-phone"></i>

            <span><?= $kontak['telepon_wa']; ?></span>
        </div>

        <div class="footer-item">
            <i class="fas fa-envelope"></i>

            <span><?= $kontak['email']; ?></span>
        </div>

    </div>


    <!-- Kolom 3 -->
    <div class="col-lg-2">

        <h3>Ikuti Kami</h3>

        <div class="footer-line"></div>

        <div class="footer-social">

            <a href="<?= $kontak['instagram']; ?>" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="<?= $kontak['youtube']; ?>" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>

            <a href="<?= $kontak['tiktok']; ?>" target="_blank">
                <i class="fab fa-tiktok"></i>
            </a>

        </div>

    </div>


    <!-- Kolom 4 -->
    <div class="col-lg-3">

        <h3>Lokasi Sekolah</h3>

        <div class="footer-line"></div>

        <div class="footer-map">
            <?= $kontak['maps']; ?>
        </div>

    </div>

</div>

<hr>

<div class="copyright">
    <?= $kontak['copyright']; ?>
</div>

</div>

</footer>