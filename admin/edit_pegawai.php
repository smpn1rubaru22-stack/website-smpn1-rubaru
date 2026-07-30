<?php
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM pegawai WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $jabatan = mysqli_real_escape_string($conn,$_POST['jabatan']);

    if($_FILES['foto']['name'] != ""){

        // Hapus foto lama
        if(file_exists("../upload/pegawai/".$row['foto'])){
            unlink("../upload/pegawai/".$row['foto']);
        }

        $foto = time()."_".$_FILES['foto']['name'];

        move_uploaded_file(
            $_FILES['foto']['tmp_name'],
            "../upload/pegawai/".$foto
        );

    }else{

        $foto = $row['foto'];

    }

    mysqli_query($conn,"
    UPDATE pegawai SET

    nama='$nama',
    jabatan='$jabatan',
    foto='$foto'

    WHERE id='$id'
    ");

    echo "
    <script>
    alert('Data berhasil diubah');
    window.location='profil_pegawai.php';
    </script>
    ";

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Edit Pegawai</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h4>Edit Guru / TU</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Foto Lama</label>

<br>

<img src="../upload/pegawai/<?= $row['foto']; ?>" width="120" class="rounded">

</div>

<div class="mb-3">

<label>Ganti Foto</label>

<input
type="file"
name="foto"
class="form-control">

</div>

<div class="mb-3">

<label>Nama</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $row['nama']; ?>"
required>

</div>

<div class="mb-3">

<label>Jabatan</label>

<input
type="text"
name="jabatan"
class="form-control"
value="<?= $row['jabatan']; ?>"
required>

</div>

<button
name="update"
class="btn btn-primary">

Update

</button>

<a href="profil_pegawai.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>
</html>