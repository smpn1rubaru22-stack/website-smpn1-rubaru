<?php
include "../config/koneksi.php";

$id = (int)$_GET['id'];

// Ambil data slider
$data = mysqli_query($conn, "SELECT * FROM slider WHERE id='$id'");

if(mysqli_num_rows($data) > 0){

    $row = mysqli_fetch_assoc($data);

    // Hapus file gambar jika ada
    if(!empty($row['gambar']) && file_exists("../upload/slider/".$row['gambar'])){
        unlink("../upload/slider/".$row['gambar']);
    }

    // Hapus data dari database
    mysqli_query($conn, "DELETE FROM slider WHERE id='$id'");
}

// Kembali ke halaman slider
header("Location: slider.php?status=hapus");
exit;
?>