<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once "../config/koneksi.php";

$data = mysqli_query($conn, "SELECT * FROM berita ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Berita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- =================TOMBOL KEMBALI KE DASBOARD ================= -->

<div class="container mt-5">

    <h2 class="mb-3">Data Berita</h2>

    <div class="mb-4">
        <a href="dashboard.php" class="btn btn-secondary me-2">
            <i class="fa-solid fa-arrow-left"></i> Dashboard
        </a>

        <a href="tambah_berita.php" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Berita
        </a>
    </div>

    <table class="table table-bordered table-hover align-middle">
    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php 
        $no = 1;
        while($row = mysqli_fetch_assoc($data)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td>
                <td>

<a href="edit_berita.php?id=<?= $row['id']; ?>" 
class="btn btn-warning btn-sm">
Edit
</a>


<a href="hapus_berita.php?id=<?= $row['id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus berita ini?')">
Hapus
</a>

</td>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>


</body>
</html>