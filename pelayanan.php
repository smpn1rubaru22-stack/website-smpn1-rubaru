<?php
include "config/koneksi.php";

$layanan = mysqli_query($conn, "SELECT * FROM layanan ORDER BY id DESC");
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
<?php include "partial/navbar.php"; ?>
<!-- ================= HEADER PELAYANAN ================= -->

<section class="pelayanan-header">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- Gambar -->
            <div class="col-lg-6">

                <img src="assets/img/pelayanan-header.jpg"
                     class="img-fluid pelayanan-cover"
                     alt="Standar Pelayanan">

            </div>

            <!-- Deskripsi -->
            <div class="col-lg-6">

                <small class="judul-pelayanan">

                    STANDAR PELAYANAN

                </small>

                <h1>

                    SMP Negeri 1 Rubaru

                </h1>

                <p>

                    SMP Negeri 1 Rubaru berkomitmen memberikan pelayanan
                    pendidikan yang cepat, mudah, transparan,
                    profesional, dan akuntabel kepada peserta didik,
                    orang tua, maupun masyarakat sesuai dengan Standar
                    Pelayanan yang telah ditetapkan.

                </p>

                <button id="btnPelayanan"
                        class="btn btn-primary btn-lg">

                    Jelajahi Standar Pelayanan

                </button>

            </div>

        </div>

    </div>

</section>



<!-- ================= ISI STANDAR PELAYANAN ================= -->

<section id="standarPelayanan"
         class="standar-pelayanan">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold text-primary">

Standar Pelayanan

</h2>

<p class="text-muted">

Informasi pelayanan SMP Negeri 1 Rubaru

</p>

</div>



<div class="row g-4">

<!-- ================= SK ================= -->

<div class="col-lg-6">

<div class="service-box">

<div class="service-icon">

<i class="fa-solid fa-file-signature"></i>

</div>

<h4>
Dokumen Standar Layanan

</h4>

<p>

Dokumen resmi Standar Pelayanan SMP Negeri 1 Rubaru
 yang disediakan sebagai bentuk keterbukaan informasi kepada masyarakat.

</p>

<a href="assets/pdf/sk-pelayanan.pdf"
   target="_blank"
   rel="noopener noreferrer"
   class="btn btn-outline-primary">

    <i class="fa-solid fa-file-pdf"></i>

    Lihat Dokumen

</a>

</div>

</div>



<!-- ================= MAKLUMAT ================= -->

<div class="col-lg-6">

<div class="service-box">

<div class="service-icon">

<i class="fa-solid fa-scroll"></i>

</div>

<h4>

Maklumat Pelayanan

</h4>

<p>

Kami siap memberikan pelayanan sesuai
standar pelayanan yang cepat,
tepat, transparan, profesional,
dan bebas dari pungutan liar.

</p>

<a href="maklumat.php"
   target="_blank"
   rel="noopener noreferrer"
   class="btn btn-outline-primary">

    Selengkapnya

</a>

</div>

</div>

</div>



<hr class="my-5">

<div class="text-center mb-5">

<h2 class="fw-bold text-primary">

Jenis Layanan

</h2>

<p class="text-muted">

Pilih layanan yang Anda butuhkan

</p>

</div>

<!--jenis layanan-->

<div class="row g-4">

<?php while($row = mysqli_fetch_assoc($layanan)){ ?>

<div class="col-lg-4">

<div class="layanan-card">

<div class="layanan-icon">

<i class="fa-solid fa-file-lines"></i>

</div>

<h5>
<?= htmlspecialchars($row['judul']); ?>
</h5>

<p>

<?=
mb_strlen($row['deskripsi']) > 80
?
htmlspecialchars(mb_substr($row['deskripsi'],0,80))."..."
:
htmlspecialchars($row['deskripsi']);
?>

</p>

<a href="detail_layanan.php?id=<?= $row['id']; ?>">

Detail →

</a>

</div>

</div>

<?php } ?>

</div>

</section>

   <!-- ================= FOOTER ================= -->
<?php include "partial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
<html>