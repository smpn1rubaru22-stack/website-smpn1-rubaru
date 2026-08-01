<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config/koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM navbar LIMIT 1");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Navbar</title>

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
<i class="fa-solid fa-bars"></i>
Kelola Navbar
</h3>

<form action="simpan_navbar.php"
      method="POST"
      enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">
Logo Website
</label>

<?php if(!empty($row['logo'])){ ?>
<br>
<img src="../assets/img/<?= $row['logo']; ?>"
     width="80"
     class="mb-2">
<?php } ?>

<input
type="file"
name="logo"
class="form-control">

</div>


<div class="mb-3">

<label class="form-label">
Nama Website
</label>

<input
type="text"
name="nama_website"
class="form-control"
value="<?= $row['nama_website']; ?>">

</div>


<div class="mb-3">

<label class="form-label">
Sub Judul
</label>

<input
type="text"
name="subjudul"
class="form-control"
value="<?= $row['subjudul']; ?>">

</div>

<button type="submit" class="btn btn-primary">
    <i class="fa-solid fa-floppy-disk"></i>
    Simpan
</button>

<a href="pengaturan.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['status']) && $_GET['status']=="sukses"){ ?>

<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Navbar berhasil diperbarui.',
    confirmButtonColor: '#0d6efd'
});
</script>

<?php } ?>

<?php if(isset($_GET['status']) && $_GET['status']=="gagal"){ ?>

<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: 'Data navbar gagal disimpan.',
    confirmButtonColor: '#dc3545'
});
</script>

<?php } ?>
</body>
</html>