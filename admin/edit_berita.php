<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once "../config/koneksi.php";


$id = $_GET['id'];

$data = mysqli_query($conn, 
"SELECT * FROM berita WHERE id='$id'");

$berita = mysqli_fetch_assoc($data);



if(isset($_POST['update'])){

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = $_POST['tanggal'];

// Ambil nama gambar lama
$gambar1 = $berita['gambar1'];
$gambar2 = $berita['gambar2'];
$gambar3 = $berita['gambar3'];

// Upload gambar 1 jika diganti
if ($_FILES['gambar1']['name'] != "") {
    $gambar1 = $_FILES['gambar1']['name'];
    move_uploaded_file($_FILES['gambar1']['tmp_name'], "../upload/berita/".$gambar1);
}

// Upload gambar 2 jika diganti
if ($_FILES['gambar2']['name'] != "") {
    $gambar2 = $_FILES['gambar2']['name'];
    move_uploaded_file($_FILES['gambar2']['tmp_name'], "../upload/berita/".$gambar2);
}

// Upload gambar 3 jika diganti
if ($_FILES['gambar3']['name'] != "") {
    $gambar3 = $_FILES['gambar3']['name'];
    move_uploaded_file($_FILES['gambar3']['tmp_name'], "../upload/berita/".$gambar3);
}

mysqli_query($conn,"
UPDATE berita SET
judul='$judul',
isi='$isi',
gambar1='$gambar1',
gambar2='$gambar2',
gambar3='$gambar3',
tanggal='$tanggal'
WHERE id='$id'
");
   
    header("Location: berita.php");
    exit;

}

?>


<!DOCTYPE html>
<html>
<head>

<title>Edit Berita</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>


<div class="container mt-5">

<h3>Edit Berita</h3>


<form method="POST" enctype="multipart/form-data">


<div class="mb-3">

<label>Judul Berita</label>

<input type="text"
name="judul"
class="form-control"
value="<?= $berita['judul']; ?>"
required>

</div>



<div class="mb-3">

<label>Isi Berita</label>

<textarea 
name="isi"
class="form-control"
rows="6"
required><?= $berita['isi']; ?></textarea>

</div>



<div class="mb-3">

<label>Gambar Saat Ini</label><br>

<label>Gambar Utama</label><br>

<img src="../upload/berita/<?= $berita['gambar1']; ?>"
width="150" class="mb-2">

<input type="file"
name="gambar1"
class="form-control">

</div>
<div class="mb-3">

<label>Gambar Tambahan 1</label><br>

<?php if(!empty($berita['gambar2'])) : ?>

<img src="../upload/berita/<?= $berita['gambar2']; ?>"
width="150"
class="mb-2">

<?php endif; ?>

<input type="file"
name="gambar2"
class="form-control">

</div>
<div class="mb-3">

<label>Gambar Tambahan 2</label><br>

<?php if(!empty($berita['gambar3'])) : ?>

<img src="../upload/berita/<?= $berita['gambar3']; ?>"
width="150"
class="mb-2">

<?php endif; ?>

<input type="file"
name="gambar3"
class="form-control">

</div>

<div class="mb-3">

<label>Tanggal</label>

<input type="date"
name="tanggal"
class="form-control"
value="<?= $berita['tanggal']; ?>"
required>

</div>


<button type="submit"
name="update"
class="btn btn-primary">

Update

</button>


<a href="berita.php"
class="btn btn-secondary">

Kembali

</a>


</form>


</div>


</body>
</html>