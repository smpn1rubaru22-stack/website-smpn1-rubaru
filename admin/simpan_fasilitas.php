<?php
include "../config/koneksi.php";

$nama       = mysqli_real_escape_string($conn, $_POST['nama']);
$deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
$urutan     = (int) $_POST['urutan'];

$gambar = "";

// Folder upload
$folder = "../upload/fasilitas/";

// Buat folder jika belum ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

// Upload gambar
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {

    $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);

    $gambar = time() . "_" . rand(1000,9999) . "." . $ext;

    move_uploaded_file(
        $_FILES['gambar']['tmp_name'],
        $folder . $gambar
    );
}

// Simpan ke database
$sql = "INSERT INTO fasilitas
        (nama, deskripsi, gambar, urutan)
        VALUES
        ('$nama','$deskripsi','$gambar','$urutan')";

$simpan = mysqli_query($conn, $sql);

if($simpan){
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>

Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'Fasilitas berhasil ditambahkan!',
    confirmButtonColor:'#0d6efd'
}).then(function(){

    window.location='fasilitas.php';

});

</script>

</body>
</html>

<?php

}else{

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>

Swal.fire({
    icon:'error',
    title:'Gagal',
    html:'<?= mysqli_error($conn); ?>',
    confirmButtonColor:'#dc3545'
}).then(function(){

    history.back();

});

</script>

</body>
</html>

<?php
}
?>