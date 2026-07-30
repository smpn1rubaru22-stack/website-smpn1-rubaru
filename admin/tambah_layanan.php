<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $persyaratan = mysqli_real_escape_string($conn, $_POST['persyaratan']);
    $prosedur = mysqli_real_escape_string($conn, $_POST['prosedur']);
    $waktu = mysqli_real_escape_string($conn, $_POST['waktu_pelayanan']);
    $produk = mysqli_real_escape_string($conn, $_POST['produk_layanan']);
    $tarif = mysqli_real_escape_string($conn, $_POST['tarif_layanan']);

    mysqli_query($conn,"
        INSERT INTO layanan
        (judul,deskripsi,persyaratan,prosedur,waktu_pelayanan,produk_layanan,tarif_layanan)
        VALUES
        (
        '$judul',
        '$deskripsi',
        '$persyaratan',
        '$prosedur',
        '$waktu',
        '$produk',
        '$tarif'
        )
    ");

    header("Location: layanan.php?status=sukses");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Tambah Layanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h4 class="mb-0">Tambah Layanan</h4>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">
Judul Layanan
</label>

<input
type="text"
name="judul"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Deskripsi Layanan
</label>

<textarea
name="deskripsi"
rows="4"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Persyaratan Pelayanan
</label>

<textarea
name="persyaratan"
rows="5"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Prosedur Pelayanan
</label>

<textarea
name="prosedur"
rows="5"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Waktu Pelayanan
</label>

<input
type="text"
name="waktu_pelayanan"
class="form-control"
placeholder="Contoh: 1 Hari Kerja"
required>

</div>

<div class="mb-3">

<label class="form-label">
Produk Layanan
</label>

<textarea
name="produk_layanan"
rows="4"
class="form-control"
required></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Tarif Layanan
</label>

<input
type="text"
name="tarif_layanan"
class="form-control"
placeholder="Contoh: Gratis"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">
Simpan
</button>

<a href="layanan.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>
</html>