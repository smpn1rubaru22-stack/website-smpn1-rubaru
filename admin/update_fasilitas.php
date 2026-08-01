<?php

include "../config/koneksi.php";


$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$urutan = $_POST['urutan'];
$gambar_lama = $_POST['gambar_lama'];


// cek gambar baru
if($_FILES['gambar']['name'] != ""){


    $gambar = time()."_".$_FILES['gambar']['name'];

    move_uploaded_file(
        $_FILES['gambar']['tmp_name'],
        "../upload/fasilitas/".$gambar
    );


    // hapus gambar lama
    if($gambar_lama != "" && file_exists("../upload/fasilitas/".$gambar_lama)){

        unlink("../upload/fasilitas/".$gambar_lama);

    }


}else{


    // tetap pakai gambar lama
    $gambar = $gambar_lama;

}


// update data fasilitas

$query = mysqli_query($conn,

"UPDATE fasilitas SET

nama='$nama',
deskripsi='$deskripsi',
gambar='$gambar',
urutan='$urutan'

WHERE id='$id'

");


// jika berhasil

if($query){

    echo "
    <script>
    alert('Fasilitas berhasil diperbarui');
    window.location='fasilitas.php';
    </script>
    ";

}else{

    echo "
    <script>
    alert('Fasilitas gagal diperbarui');
    window.location='fasilitas.php';
    </script>
    ";

}


?>