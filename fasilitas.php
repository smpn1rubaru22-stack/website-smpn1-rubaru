<?php

include "config/koneksi.php";

$fasilitas = mysqli_query($conn, 
"SELECT * FROM fasilitas ORDER BY urutan ASC");

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

 <?php while($row = mysqli_fetch_assoc($fasilitas)){ ?>

<div class="col-lg-3 col-md-6">

    <div class="fasilitas-card">


        <img 
        src="upload/fasilitas/<?= $row['gambar']; ?>" 
        alt="<?= $row['nama']; ?>">



        <div class="p-3">


            <h5>
                <?= $row['nama']; ?>
            </h5>



            <p>
                <?= $row['deskripsi']; ?>
            </p>


        </div>

  </div>

</div>
          
<?php } ?>


</section>
<!-- ================= FOOTER ================= -->
<?php include "partial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
</html>