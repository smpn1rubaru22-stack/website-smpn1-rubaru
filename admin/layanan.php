<?php
include "../config/koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM layanan ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Kelola Layanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['status'])){ ?>

<script>

<?php if($_GET['status']=="sukses"){ ?>

Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'Layanan berhasil ditambahkan.',
    confirmButtonColor:'#0d6efd'
});

<?php } ?>

<?php if($_GET['status']=="edit"){ ?>

Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'Layanan berhasil diperbarui.',
    confirmButtonColor:'#0d6efd'
});

<?php } ?>

<?php if($_GET['status']=="hapus"){ ?>

Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'Layanan berhasil dihapus.',
    confirmButtonColor:'#0d6efd'
});

<?php } ?>

</script>

<?php } ?>

<body class="bg-light">

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">

<h3>Kelola Layanan</h3>

<a href="tambah_layanan.php" class="btn btn-primary">
+ Tambah Layanan
</a>

</div>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-hover align-middle">

<thead class="table-primary">

<tr>

<th width="60">No</th>

<th>Judul Layanan</th>

<th width="170">Waktu</th>

<th width="120">Tarif</th>

<th width="170">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

if(mysqli_num_rows($data) > 0){

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($row['judul']); ?></td>

<td><?= htmlspecialchars($row['waktu_pelayanan']); ?></td>

<td><?= htmlspecialchars($row['tarif_layanan']); ?></td>

<td>

<a href="edit_layanan.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus_layanan.php?id=<?= $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus layanan ini?')">
Hapus
</a>

</td>

</tr>

<?php
}
}else{
?>

<tr>

<td colspan="5" class="text-center">
Belum ada data layanan.
</td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="dashboard.php" class="btn btn-secondary">
←