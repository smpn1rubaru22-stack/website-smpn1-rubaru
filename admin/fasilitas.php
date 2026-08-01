<?php
include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM fasilitas ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Fasilitas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h5>Kelola Fasilitas Sekolah</h5>
</div>

<div class="card-body">

<a href="dashboard.php" class="btn btn-secondary mb-3">
<i class="fa fa-home"></i> Kembali ke Dashboard
</a>

<a href="tambah_fasilitas.php" class="btn btn-success mb-3">
<i class="fa fa-plus"></i> Tambah Fasilitas
</a>


<table class="table table-bordered table-striped">

<tr>
<th>No</th>
<th>Gambar</th>
<th>Nama Fasilitas</th>
<th>Deskripsi</th>
<th>Urutan</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
while($row=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++; ?></td>


<td>

<img src="../upload/fasilitas/<?= $row['gambar']; ?>" 
width="100"
class="rounded">

</td>


<td>
<?= $row['nama']; ?>
</td>


<td>
<?= $row['deskripsi']; ?>
</td>


<td>
<?= $row['urutan']; ?>
</td>


<td>

<a href="edit_fasilitas.php?id=<?= $row['id']; ?>" 
class="btn btn-warning btn-sm">
Edit
</a>


<a href="hapus_fasilitas.php?id=<?= $row['id']; ?>" 
onclick="return confirm('Yakin ingin menghapus fasilitas ini?')" 
class="btn btn-danger btn-sm">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>


</div>

</div>

</div>

</body>
</html>