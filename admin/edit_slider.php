<?php
include "../config/koneksi.php";

$id = (int)$_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM slider WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(!$row){
    die("Data tidak ditemukan.");
}

if(isset($_POST['update'])){

    $judul  = mysqli_real_escape_string($conn,$_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn,$_POST['deskripsi']);
    $urutan = (int)$_POST['urutan'];

    $gambar = $row['gambar'];

    if(!empty($_FILES['gambar']['name'])){

        // hapus gambar lama
        if(file_exists("../upload/slider/".$gambar)){
            unlink("../upload/slider/".$gambar);
        }

        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);

        $gambar = time().".".$ext;

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../upload/slider/".$gambar
        );
    }

    mysqli_query($conn,"
UPDATE slider SET
    judul='$judul',
    deskripsi='$deskripsi',
    gambar='$gambar',
    urutan='$urutan'
WHERE id='$id'
");
   

    header("Location: slider.php?status=edit");
    exit;

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Edit Slider</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h4 class="mb-0">

Edit Slider Beranda

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
value="<?= $row['judul']; ?>"
required>

</div>
<div class="mb-3">
    <label class="form-label">Deskripsi</label>

    <textarea
        name="deskripsi"
        class="form-control"
        rows="3"><?= $row['deskripsi']; ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Gambar Slider
</label>

<br>

<img
src="../upload/slider/<?= $row['gambar']; ?>"
width="250"
class="img-thumbnail mb-3">

<input
type="file"
name="gambar"
class="form-control"
accept="image/*">

<small class="text-muted">
Kosongkan jika gambar tidak ingin diganti.
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
value="<?= $row['urutan']; ?>"
required>

</div>

<button
type="submit"
name="update"
class="btn btn-warning">

Update

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