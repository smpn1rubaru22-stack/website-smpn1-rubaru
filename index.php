<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "config/koneksi.php";

$slider = mysqli_query($conn,"SELECT * FROM slider ORDER BY urutan ASC");

$queryBerita = mysqli_query($conn,
"SELECT * FROM berita ORDER BY tanggal DESC LIMIT 5");

$semuaBerita = mysqli_fetch_all($queryBerita, MYSQLI_ASSOC);

// Ambil data kontak
$kontak = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM kontak LIMIT 1")
);
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
   <link rel="stylesheet" href="assets/css/style.css?v=2">

</head>

<body>
    <?php $halaman = basename($_SERVER['PHP_SELF']);?>

<?php include "partial/navbar.php"; ?>

<!-- ================= SLIDER ================= -->

<div id="carouselSekolah"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="5000"
     data-bs-wrap="true"
     data-bs-pause="false">

    <!-- Indicator -->
    <div class="carousel-indicators">

        <?php
        $indikator = mysqli_query($conn,"SELECT * FROM slider ORDER BY urutan ASC");
        $i = 0;

        while($item = mysqli_fetch_assoc($indikator)){
        ?>

        <button
            type="button"
            data-bs-target="#carouselSekolah"
            data-bs-slide-to="<?= $i; ?>"
            class="<?= ($i==0)?'active':''; ?>">
        </button>

        <?php
        $i++;
        }
        ?>

    </div>

    <!-- Isi Slider -->
    <div class="carousel-inner">

        <?php
        $no = 0;

        while($row = mysqli_fetch_assoc($slider)){
        ?>

        <div class="carousel-item <?= ($no==0)?'active':''; ?>">

            <img
                src="upload/slider/<?= $row['gambar']; ?>"
                class="d-block w-100 slider-img"
                alt="<?= $row['judul']; ?>">

            <div class="carousel-caption">

                <h1><?= $row['judul']; ?></h1>

                <p><?= $row['deskripsi']; ?></p>

                <?php if($no == 0){ ?>

<a href="profil.php" class="btn btn-warning btn-lg">
    Lihat Profil
</a>

<?php } ?>

            </div>

        </div>

        <?php
        $no++;
        }
        ?>

    </div>

    <!-- Tombol -->
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselSekolah"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#carouselSekolah"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

<!-- ================= BERITA ================= -->

<!-- BERITA TERKINI -->
<section class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <small class="text-primary fw-bold">TERBARU</small>
            <h2 class="fw-bold">Berita Sekolah</h2>
        </div>

        <a href="berita.php" class="text-decoration-none">
            Lihat Semua →
        </a>

    </div>

    <div class="row">

        <!-- BERITA UTAMA -->
<?php if (!empty($semuaBerita)) : ?>

<div class="col-lg-8">

    <div class="card border-0 shadow">

        <img src="upload/berita/<?= htmlspecialchars($semuaBerita[0]['gambar1']); ?>"
             class="card-img-top berita-utama"
             alt="<?= htmlspecialchars($semuaBerita[0]['judul']); ?>">

        <div class="card-body">

            <h3 class="mt-3 text-primary fw-bold">
                <?= htmlspecialchars($semuaBerita[0]['judul']); ?>
            </h3>

            <p class="text-muted">
                <?= date('d F Y', strtotime($semuaBerita[0]['tanggal'])); ?>
            </p>

            <p>
                <?= mb_substr(strip_tags($semuaBerita[0]['isi']), 0, 250); ?>...

                <a href="detail.php?slug=<?= htmlspecialchars($semuaBerita[0]['slug']); ?>">
                    Baca Selengkapnya →
                </a>
            </p>

        </div>

    </div>

</div>

<?php else : ?>

<div class="col-lg-8">
    <div class="alert alert-info">
        Belum ada berita yang dipublikasikan.
    </div>
</div>

<?php endif; ?>

     <!-- BERITA LAINNYA -->
    <div class="col-lg-4">

<?php
for ($i = 1; $i < count($semuaBerita); $i++) :
?>

    <div class="berita-kecil mb-3">

        <img src="upload/berita/<?= htmlspecialchars($semuaBerita[$i]['gambar1']); ?>"
             alt="<?= htmlspecialchars($semuaBerita[$i]['judul']); ?>">

        <div>

            <small class="text-primary">
                <?= date('d M Y', strtotime($semuaBerita[$i]['tanggal'])); ?>
            </small>

            <h6>
                <?= htmlspecialchars($semuaBerita[$i]['judul']); ?>
            </h6>

            <a href="detail.php?slug=<?= htmlspecialchars($semuaBerita[$i]['slug']); ?>">
                Baca Selengkapnya →
            </a>

        </div>

    </div>

<?php endfor; ?>

</div>

</section>

<?php include "partial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>