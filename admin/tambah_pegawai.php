<?php
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    $nama     = mysqli_real_escape_string($conn,$_POST['nama']);
    $jabatan  = mysqli_real_escape_string($conn,$_POST['jabatan']);

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    if($foto != ""){

        $namaFoto = time()."_".$foto;

        move_uploaded_file($tmp,"../upload/pegawai/".$namaFoto);

    }else{

        $namaFoto = "";

    }

    mysqli_query($conn,"
    INSERT INTO pegawai(nama,jabatan,foto)
    VALUES(
    '$nama',
    '$jabatan',
    '$namaFoto'
    )
    ");

    echo "
    <script>
        alert('Data berhasil disimpan');
        window.location='profil_pegawai.php';
    </script>
    ";

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Tambah Pegawai</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">
Tambah Guru / Tenaga Kependidikan
</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">
Foto
</label>

<input
type="file"
name="foto"
class="form-control"
accept="image/*"
required>

</div>

<div class="mb-3">

<label class="form-label">
Nama
</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Jabatan
</label>

<input
type="text"
name="jabatan"
class="form-control"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

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