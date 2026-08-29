<?php
require_once "config/koneksi.php";

// Cek apakah slug ada
if (!isset($_GET['slug'])) {
    header("Location: berita.php");
    exit;
}

$slug = mysqli_real_escape_string($conn, $_GET['slug']);

// Ambil detail berita
$query = mysqli_query($conn, "
SELECT *
FROM berita
WHERE slug='$slug'
LIMIT 1
");

if(mysqli_num_rows($query) == 0){
    header("Location: berita.php");
    exit;
}

$berita = mysqli_fetch_assoc($query);

// Ambil 3 berita lainnya
$beritaLain = mysqli_query($conn, "
SELECT *
FROM berita
WHERE id != {$berita['id']}
ORDER BY tanggal DESC
LIMIT 3
");
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
<?php include "partial/navbar.php"; ?>
<!-- ================= DETAIL BERITA ================= -->

<section class="container" style="padding-top:100px; padding-bottom:50px;">

    <div class="container">

        <!-- Tombol Kembali -->

        <a href="berita.php" class="btn btn-outline-primary mb-4">

            <i class="fa-solid fa-arrow-left"></i>

            Kembali ke Berita

        </a>

        <!-- Judul -->

        <h2 class="detail-judul">

            <?= htmlspecialchars($berita['judul']); ?>

        </h2>

        <!-- Tanggal -->

        <p class="detail-tanggal">

            <i class="fa-solid fa-calendar-days"></i>

            <?= date('d F Y', strtotime($berita['tanggal'])); ?>

        </p>

       
<div class="row g-5 align-items-start">

    <!-- ================= ISI BERITA ================= -->

    <div class="col-lg-8">

        <div class="detail-isi">

            <?php
            // Pisahkan isi berita berdasarkan paragraf
            $paragraf = preg_split('/\r\n|\r|\n/', trim($berita['isi']));

            // Hapus paragraf kosong
            $paragraf = array_values(array_filter($paragraf, function($p){
                return trim($p) !== '';
            }));

            $jumlah = count($paragraf);

            // Tentukan posisi gambar
            $posisiGambar2 = ceil($jumlah / 3);
            $posisiGambar3 = ceil(($jumlah * 2) / 3);

            // Gambar 1 - AWAL
            if(!empty($berita['gambar1'])) {
            ?>
                <img src="upload/berita/<?= htmlspecialchars($berita['gambar1']); ?>"
                     class="img-fluid rounded shadow detail-gambar-tengah mb-4"
                     alt="<?= htmlspecialchars($berita['judul']); ?>">
            <?php
            }

            // Tampilkan paragraf satu per satu
            foreach($paragraf as $index => $p) {

                echo '<p>' . htmlspecialchars($p) . '</p>';

                // Gambar 2 - TENGAH
                if(($index + 1) == $posisiGambar2 && !empty($berita['gambar2'])) {
                ?>
                    <img src="upload/berita/<?= htmlspecialchars($berita['gambar2']); ?>"
                         class="img-fluid rounded shadow detail-gambar-tengah mb-4"
                         alt="<?= htmlspecialchars($berita['judul']); ?>">
                <?php
                }

                // Gambar 3 - AKHIR
                if(($index + 1) == $posisiGambar3 && !empty($berita['gambar3'])) {
                ?>
                    <img src="upload/berita/<?= htmlspecialchars($berita['gambar3']); ?>"
                         class="img-fluid rounded shadow detail-gambar-tengah mb-4"
                         alt="<?= htmlspecialchars($berita['judul']); ?>">
                <?php
                }
            }
            ?>

        </div>

    </div>
</div>
```

</section>

<!-- ================= BERITA LAINNYA ================= -->

<div class="container mt-5">

    <h3 class="fw-bold mb-4">
        Berita Lainnya
    </h3>

    <div class="row">

    <?php

    $berita_lain = mysqli_query($conn,"
        SELECT *
        FROM berita
        WHERE id != '".$berita['id']."'
        ORDER BY tanggal DESC
        LIMIT 3
    ");

    while($data = mysqli_fetch_assoc($berita_lain)) {

    ?>

        <div class="col-lg-4 mb-4">

            <div class="card shadow-sm h-100">

                <img src="upload/berita/<?= $data['gambar1']; ?>"
                     class="card-img-top"
                     style="height:200px; object-fit:cover;">


                <div class="card-body">

                    <h5 class="fw-bold">
                        <?= $data['judul']; ?>
                    </h5>


                    <small class="text-muted">
                        <?= date('d F Y', strtotime($data['tanggal'])); ?>
                    </small>


                    <p class="mt-3">
                        <?= substr(strip_tags($data['isi']),0,120); ?>...
                    </p>


                    <a href="detail.php?slug=<?= $data['slug']; ?>"
                       class="btn btn-primary btn-sm">
                       Baca Selengkapnya
                    </a>

                </div>

            </div>

        </div>


    <?php } ?>

    </div>

</div>
  
<?php include "partial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
