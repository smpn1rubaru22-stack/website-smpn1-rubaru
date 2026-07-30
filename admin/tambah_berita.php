<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once "../config/koneksi.php";


if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];


    // membuat slug
    $slug = strtolower($judul);
    $slug = str_replace(" ", "-", $slug);


    // Upload Gambar 1
$gambar1 = $_FILES['gambar1']['name'];
$tmp1 = $_FILES['gambar1']['tmp_name'];

if (!empty($gambar1)) {
    move_uploaded_file($tmp1, "../upload/berita/" . $gambar1);
}

// Upload Gambar 2
$gambar2 = $_FILES['gambar2']['name'];
$tmp2 = $_FILES['gambar2']['tmp_name'];

if (!empty($gambar2)) {
    move_uploaded_file($tmp2, "../upload/berita/" . $gambar2);
}

// Upload Gambar 3
$gambar3 = $_FILES['gambar3']['name'];
$tmp3 = $_FILES['gambar3']['tmp_name'];

if (!empty($gambar3)) {
    move_uploaded_file($tmp3, "../upload/berita/" . $gambar3);
}

mysqli_query($conn,
"INSERT INTO berita
(judul, slug, isi, gambar1, gambar2, gambar3, tanggal)
VALUES
('$judul','$slug','$isi','$gambar1','$gambar2','$gambar3','$tanggal')
");

    header("Location: berita.php");
    exit;

}

?>


<!DOCTYPE html>
<html>
<head>

<title>Tambah Berita</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<div class="container mt-5">

<h3>Tambah Berita</h3>


<form method="POST" enctype="multipart/form-data">


<div class="mb-3">
<label>Judul Berita</label>
<input type="text" 
name="judul" 
class="form-control"
required>
</div>


<div class="mb-3">
<label>Isi Berita</label>
<textarea 
name="isi"
class="form-control"
rows="6"
required></textarea>
</div>


<div class="mb-3">
<label>Gambar Utama</label>
<input type="file"
name="gambar1"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Gambar Tambahan 1 (Opsional)</label>
<input type="file"
name="gambar2"
class="form-control">
</div>

<div class="mb-3">
<label>Gambar Tambahan 2 (Opsional)</label>
<input type="file"
name="gambar3"
class="form-control">
</div>


<div class="mb-3">
<label>Tanggal</label>
<input type="date"
name="tanggal"
class="form-control"
required>
</div>


<button type="submit" 
name="simpan"
class="btn btn-primary">

Simpan

</button>


<a href="berita.php" class="btn btn-secondary">
Kembali
</a>


</form>


</div>

</body>
</html>