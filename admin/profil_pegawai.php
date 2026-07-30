<?php
include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM pegawai ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Kelola Guru & TU</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="d-flex justify-content-between mb-4">

<h3>Guru & Tenaga Kependidikan</h3>

<a href="tambah_pegawai.php" class="btn btn-primary">
+ Tambah Pegawai
</a>

</div>

<table class="table table-bordered table-hover align-middle">

<thead class="table-primary">

<tr>

<th width="60">No</th>

<th width="120">Foto</th>

<th>Nama</th>

<th>Jabatan</th>

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

<img src="../upload/pegawai/<?= $row['foto']; ?>"

width="80"

class="rounded">

</td>

<td><?= $row['nama']; ?></td>

<td><?= $row['jabatan']; ?></td>

<td>

<a href="edit_pegawai.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">

Edit

</a>

<a href="hapus_pegawai.php?id=<?= $row['id']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Hapus data?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="profil.php" class="btn btn-secondary">

Kembali

</a>

</div>

</body>

</html>