<?php

include "../config/koneksi.php";

if(isset($_POST['simpan'])){

    $gambar = "";

    // Upload gambar
    if($_FILES['gambar']['name'] != ""){

        $gambar = time() . "_" . $_FILES['gambar']['name'];

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../upload/struktur/" . $gambar
        );

    }

    // Cek apakah sudah ada data
    $cek = mysqli_query($conn, "SELECT * FROM struktur_organisasi LIMIT 1");

    if(mysqli_num_rows($cek) > 0){

        $data = mysqli_fetch_assoc($cek);

        // Hapus gambar lama jika ada
        if($data['gambar'] != "" && file_exists("../upload/struktur/" . $data['gambar'])){
            unlink("../upload/struktur/" . $data['gambar']);
        }

        mysqli_query($conn, "
            UPDATE struktur_organisasi
            SET gambar='$gambar'
            WHERE id='".$data['id']."'
        ");

    }else{

        mysqli_query($conn, "
            INSERT INTO struktur_organisasi(gambar)
            VALUES('$gambar')
        ");

    }

    echo "
    <script>
        alert('Struktur organisasi berhasil disimpan');
        window.location='struktur.php';
    </script>
    ";

}else{

    header("Location: struktur.php");
    exit;

}

?>