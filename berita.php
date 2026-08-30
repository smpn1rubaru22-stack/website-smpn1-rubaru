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
    <link rel="icon" type="image/png" href="upload/logo/logo.png?v=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=7">

</head>

<body>
<?php include "partial/navbar.php"; ?>
<main style="padding-top: 45px;">
<section class="header-berita">

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
<?php include "partial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
