<?php
include "../config/koneksi.php";

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kepala_sekolah LIMIT 1"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Kepala Sekolah</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h4 class="mb-0">Kelola Kepala Sekolah</h4>
</div>

<div class="card-body">

<form action="simpan_kepsek.php" method="post" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">
Foto Kepala Sekolah
</label>

<?php if(!empty($data['foto'])){ ?>
<div class="mb-2">
<img src="../upload/kepsek/<?= $data['foto']; ?>"
     width="150"
     class="img-thumbnail">
</div>
<?php } ?>

<input type="file" name="foto" class="form-control">

<small class="text-muted">
Kosongkan jika tidak ingin mengganti foto.
</small>

</div>

<div class="mb-3">

<label class="form-label">
Nama Kepala Sekolah
</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $data['nama'] ?? ''; ?>">

</div>

<div class="mb-3">

<label class="form-label">
Jabatan
</label>

<input
type="text"
name="jabatan"
class="form-control"
value="<?= $data['jabatan'] ?? ''; ?>">

</div>

<div class="mb-3">

<label class="form-label">
Sambutan Kepala Sekolah
</label>

<textarea
name="sambutan"
rows="10"
class="form-control"><?= $data['sambutan'] ?? ''; ?></textarea>

</div>

<button type="submit" class="btn btn-primary">
<i class="fa fa-save"></i>
Simpan Perubahan
</button>

<a href="profil.php" class="btn btn-secondary">
Kembali
</a>

</form>

</div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['status']) && $_GET['status']=="sukses"){ ?>

<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Data Kepala Sekolah berhasil disimpan.',
    confirmButtonColor: '#0d6efd'
});
</script>

<?php } ?>

<?php if(isset($_GET['status']) && $_GET['status']=="gagal"){ ?>

<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: 'Data Kepala Sekolah gagal disimpan.',
    confirmButtonColor: '#dc3545'
});
</script>

<?php } ?>