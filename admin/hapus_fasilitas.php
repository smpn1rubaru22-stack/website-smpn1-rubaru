<?php
include "../config/koneksi.php";

// cek id
if(isset($_GET['id'])){

    $id = $_GET['id'];

    // ambil data fasilitas untuk menghapus gambar
    $query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    // hapus gambar jika ada
    if($data['gambar'] != ""){
        $file = "../upload/fasilitas/".$data['gambar'];

        if(file_exists($file)){
            unlink($file);
        }
    }

    // hapus data dari database
    mysqli_query($conn, "DELETE FROM fasilitas WHERE id='$id'");

    echo "
    <script>
        alert('Fasilitas berhasil dihapus');
        window.location='fasilitas.php';
    </script>
    ";

}else{

    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location='fasilitas.php';
    </script>
    ";

}

?>