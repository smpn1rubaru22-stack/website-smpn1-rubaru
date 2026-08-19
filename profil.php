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

<?php include "partial/navbar.php"; ?>

<!-- ================= HEADER PROFIL ================= -->

<section class="profil-header" style="padding:120px 0 50px;">

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
    src="upload/struktur/<?= $struktur['gambar']; ?>"
    alt="Struktur Organisasi"
    style="width:300px; height:auto; display:block; margin:auto;">

<?php }else{ ?>

<div class="alert alert-warning text-center">
    Gambar struktur organisasi belum tersedia.
</div>

<?php } ?>

        </div>

    </div>

</section>


<?php include "partial/footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

</body>
</html>