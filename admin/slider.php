<?php
include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM slider ORDER BY urutan ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Kelola Slider</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['status'])){ ?>

<script>

<?php if($_GET['status']=="sukses"){ ?>

Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Slider berhasil ditambahkan.',
    confirmButtonColor: '#0d6efd'
});

<?php } ?>

<?php if($_GET['status']=="edit"){ ?>

Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Slider berhasil diperbarui.',
    confirmButtonColor: '#0d6efd'
});

<?php } ?>

<?php if($_GET['status']=="hapus"){ ?>

Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Slider berhasil dihapus.',
    confirmButtonColor: '#dc3545'
});

<?php } ?>

</script>

<?php } ?>

<body class="bg-light">

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h3>Kelola Slider Beranda</h3>

<a href="tambah_slider.php" class="btn btn-primary">
+ Tambah Slider
</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover align-middle">

<thead class="table-primary">

<tr>

<th width="60">No</th>

<th width="120">Gambar</th>

<th>Judul</th>

<th width="90">Urutan</th>

<th width="170">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;

while($row=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td>

<img src="../upload/slider/<?= $row['gambar']; ?>"
width="120"
class="rounded">

</td>

<td><?= $row['judul']; ?></td>

<td><?= $row['urutan']; ?></td>

<td>

<a href="edit_slider.php?id=<?= $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus_slider.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus slider ini?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<br>

<a href="pengaturan.php" class="btn btn-secondary">

← Kembali

</a>

</div>

</body>
</html>