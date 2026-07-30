<?php
include "../config/koneksi.php";

$id = (int)$_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM layanan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['simpan'])){

    $judul = mysqli_real_escape_string($conn,$_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn,$_POST['deskripsi']);
    $persyaratan = mysqli_real_escape_string($conn,$_POST['persyaratan']);
    $prosedur = mysqli_real_escape_string($conn,$_POST['prosedur']);
    $waktu = mysqli_real_escape_string($conn,$_POST['waktu_pelayanan']);
    $produk = mysqli_real_escape_string($conn,$_POST['produk_layanan']);
    $tarif = mysqli_real_escape_string($conn,$_POST['tarif_layanan']);

    mysqli_query($conn,"
    UPDATE layanan SET
        judul='$judul',
        deskripsi='$deskripsi',
        persyaratan='$persyaratan',
        prosedur='$prosedur',
        waktu_pelayanan='$waktu',
        produk_layanan='$produk',
        tarif_layanan='$tarif'
    WHERE id='$id'
    ");

    header("Location: layanan.php?status=edit");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<title>Edit Layanan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h4 class="mb-0">
Edit Layanan
</h4>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">
Judul Layanan
</label>

<input
type="text"
name="judul"
class="form-control"
value="<?= htmlspecialchars($row['judul']); ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Deskripsi Layanan
</label>

<textarea
name="deskripsi"
rows="4"
class="form-control"
required><?= htmlspecialchars($row['deskripsi']); ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Persyaratan Pelayanan
</label>

<textarea
name="persyaratan"
rows="5"
class="form-control"
required><?= htmlspecialchars($row['persyaratan']); ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Prosedur Pelayanan
</label>

<textarea
name="prosedur"
rows="5"
class="form-control"
required><?= htmlspecialchars($row['prosedur']); ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Waktu Pelayanan
</label>

<input
type="text"
name="waktu_pelayanan"
class="form-control"
value="<?= htmlspecialchars($row['waktu_pelayanan']); ?>"
required>

</div>

<div class="mb-3">

<label class="form-label">
Produk Layanan
</label>

<textarea
name="produk_layanan"
rows="4"
class="form-control"
required><?= htmlspecialchars($row['produk_layanan']); ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Tarif Layanan
</label>

<input
type="text"
name="tarif_layanan"
class="form-control"
value="<?= htmlspecialchars($row['tarif_layanan']); ?>"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">
Simpan Perubahan
</button>

<a href="layanan.php"
class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>

</body>
</html>