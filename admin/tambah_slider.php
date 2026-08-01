<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    $judul      = mysqli_real_escape_string($conn,$_POST['judul']);
    $deskripsi  = mysqli_real_escape_string($conn,$_POST['deskripsi']);
    $urutan     = (int)$_POST['urutan'];

    $namaFoto = "";

    if(!empty($_FILES['gambar']['name'])){

        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);

        $namaFoto = time().".".$ext;

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../upload/slider/".$namaFoto
        );

    }

    mysqli_query($conn,"
        INSERT INTO slider(judul,deskripsi,gambar,urutan)
        VALUES(
            '$judul',
            '$deskripsi',
            '$namaFoto',
            '$urutan'
        )
    ");

    header("Location: slider.php?status=sukses");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Tambah Slider</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">

Tambah Slider Beranda

</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">

Judul Slider

</label>

<input
type="text"
name="judul"
class="form-control"
required>

</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea
        name="deskripsi"
        class="form-control"
        rows="3"
        required></textarea>
</div>

<div class="mb-3">

<label class="form-label">

Gambar Slider

</label>

<input
type="file"
name="gambar"
class="form-control"
accept="image/*"
required>

<small class="text-muted">
Disarankan ukuran 1920 × 700 px.
</small>

</div>

<div class="mb-3">

<label class="form-label">

Urutan

</label>

<input
type="number"
name="urutan"
class="form-control"
value="1"
min="1"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

<a href="slider.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>
</html>