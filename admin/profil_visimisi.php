<?php
include "../config/koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM visi_misi LIMIT 1");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Visi & Misi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">
    <?php if(isset($_GET['status']) && $_GET['status']=='sukses'){ ?>

<div class="alert alert-success alert-dismissible fade show" role="alert">

    <strong>Berhasil!</strong> Data visi dan misi berhasil disimpan.

    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

</div>

<?php } ?>

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">
Kelola Visi & Misi
</h4>

</div>

<div class="card-body">

<form action="simpan_visimisi.php" method="POST">

<div class="mb-3">

<label class="form-label">
Visi
</label>

<textarea
name="visi"
rows="4"
class="form-control"
required><?= $row['visi'] ?? ''; ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Misi
</label>

<textarea
name="misi"
rows="8"
class="form-control"
required><?= $row['misi'] ?? ''; ?></textarea>

</div>

<button class="btn btn-primary">
Simpan
</button>

<a href="profil.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>