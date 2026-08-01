<?php

include "../config/koneksi.php";


if(isset($_POST['simpan'])){


    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $urutan = $_POST['urutan'];


    // upload gambar
    $gambar = "";

    if($_FILES['gambar']['name'] != ""){


        $gambar = time()."_".$_FILES['gambar']['name'];


        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../upload/fasilitas/".$gambar
        );


    }



    // simpan ke database

    $query = mysqli_query($conn,

    "INSERT INTO fasilitas

    (nama, deskripsi, gambar, urutan)

    VALUES

    ('$nama','$deskripsi','$gambar','$urutan')

    ");


    if($query){


        echo "
        <script>
        alert('Fasilitas berhasil ditambahkan');
        window.location='fasilitas.php';
        </script>
        ";


    }else{


        echo "
        <script>
        alert('Gagal menambahkan fasilitas');
        window.location='tambah_fasilitas.php';
        </script>
        ";


    }


}

?>


<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Tambah Fasilitas</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


</head>


<body class="bg-light">


<div class="container py-5">


<div class="card shadow">


<div class="card-header bg-primary text-white">

<h5>
<i class="fa-solid fa-school"></i>
Tambah Fasilitas Sekolah
</h5>

</div>



<div class="card-body">


<form method="POST" enctype="multipart/form-data">



<div class="mb-3">

<label class="form-label">
Nama Fasilitas
</label>

<input 
type="text"
name="nama"
class="form-control"
placeholder="Contoh: Laboratorium Komputer"
required>

</div>



<div class="mb-3">

<label class="form-label">
Deskripsi
</label>


<textarea
name="deskripsi"
class="form-control"
rows="5"
placeholder="Deskripsi fasilitas"
required></textarea>


</div>




<div class="mb-3">

<label class="form-label">
Foto Fasilitas
</label>


<input
type="file"
name="gambar"
class="form-control">


</div>




<div class="mb-3">

<label class="form-label">
Urutan Tampilan
</label>


<input
type="number"
name="urutan"
class="form-control"
value="1">


</div>




<button 
type="submit"
name="simpan"
class="btn btn-success">

<i class="fa-solid fa-save"></i>
Simpan

</button>



<a href="fasilitas.php"
class="btn btn-secondary">

Kembali

</a>



</form>


</div>


</div>


</div>


</body>

</html>