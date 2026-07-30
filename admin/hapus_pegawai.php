<?php
include "../config/koneksi.php";

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    // Ambil data pegawai
    $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id=$id");

    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

        // Hapus foto
        if(!empty($row['foto']) && file_exists("../upload/pegawai/".$row['foto'])){
            unlink("../upload/pegawai/".$row['foto']);
        }

        // Hapus data
        mysqli_query($conn, "DELETE FROM pegawai WHERE id=$id");
    }
}

header("Location: profil_pegawai.php?status=hapus");
exit;