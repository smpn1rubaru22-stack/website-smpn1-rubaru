<?php
require_once "config/koneksi.php";

$kontak = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM kontak LIMIT 1")
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
    <link rel="stylesheet" href="assets/css/style.css?v=3">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php
$halaman = basename($_SERVER['PHP_SELF']);
?>
<!-- ================= NAVBAR ================= -->
<?php include "partial/navbar.php"; ?>

<section class="hero-kontak">
    <h1>Kontak</h1>
    <p>Hubungi <?= $kontak['nama_website']; ?></p>
</section>


<section class="kontak-section">

    <div class="kontak-info">

        <div class="kontak-item">
            <div class="icon">📍</div>
            <div>
                <h3>Alamat</h3>
                <p>
    <?= nl2br($kontak['alamat']); ?>
</p>
            </div>
        </div>


        <div class="kontak-item">
            <div class="icon">☎</div>
            <div>
                <h3>Telepon</h3>
                <p><?= $kontak['telepon_wa']; ?></p>
            </div>
        </div>


        <div class="kontak-item">
            <div class="icon">✉</div>
            <div>
                <h3>Email</h3>
                <p><?= $kontak['email']; ?></p>
            </div>
        </div>


        <div class="kontak-item">
            <div class="icon">⏰</div>
            <div>
                <h3>Jam Pelayanan</h3>
                <p><?= nl2br($kontak['jam_pelayanan']); ?></p>
            </div>
        </div>


        <h3 class="judul-sosmed">
            Media Sosial
        </h3>

        <div class="social">

    <a href="<?= $kontak['instagram']; ?>" target="_blank">
        <i class="fab fa-instagram"></i> Instagram
    </a>

    <a href="<?= $kontak['tiktok']; ?>" target="_blank">
        <i class="fab fa-tiktok"></i> TikTok
    </a>

    <a href="<?= $kontak['youtube']; ?>" target="_blank">
        <i class="fab fa-youtube"></i> YouTube
    </a>

</div>

    </div>



    <div class="maps">

        <?= $kontak['maps']; ?>

    </div>


</section>
<!-- ================= FOOTER ================= -->
<footer class="footer-simple">
    <div class="container">
        <div class="copyright">
            <?= $kontak['copyright']; ?>
        </div>

    </div>

</footer>

</body>
</html>