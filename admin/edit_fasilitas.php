<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM fasilitas WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Edit Fasilitas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<style>

body{
    background:#f4f6f9;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

</style>

</head>
<body>

<div class="container py-5">

<div class="card p-4">

<h3 class="mb-4">

<i class="fa-solid fa-pen"></i>

Edit Fasilitas

</h3>

<form action="update_fasilitas.php"
method="POST"
enctype="multipart/form-data">

<input
type="hidden"
name="id"
value="<?= $row['id']; ?>">

<input
type="hidden"
name="gambar_lama"
value="<?= $row['gambar']; ?>">

<div class="mb-3">

<label class="form-label">
Nama Fasilitas
</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $row['nama']; ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Deskripsi
</label>

<textarea
name="deskripsi"
rows="5"
class="form-control"
required><?= $row['deskripsi']; ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Foto Saat Ini
</label>

<br>

<img src="../upload/fasilitas/<?= $row['gambar']; ?>"
width="180"
class="mb-3 rounded">

<input
type="file"
name="gambar"
class="form-control">

</div>

<div class="mb-3">

<label class="form-label">
Urutan
</label>

<input
type="number"
name="urutan"
class="form-control"
value="<?= $row['urutan']; ?>">

</div>

<button
class="btn btn-primary">

<i class="fa-solid fa-floppy-disk"></i>

Update

</button>

<a href="fasilitas.php"
class="btn btn-secondary">

Kembali

</a>

<form action="update_fasilitas.php"
method="POST"
enctype="multipart/form-data">

</div>

</div>

</body>
</html>