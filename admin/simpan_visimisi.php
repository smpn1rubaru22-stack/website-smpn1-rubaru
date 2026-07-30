<?php
include "../config/koneksi.php";

$visi = mysqli_real_escape_string($conn, $_POST['visi']);
$misi = mysqli_real_escape_string($conn, $_POST['misi']);

// Cek apakah data sudah ada
$cek = mysqli_query($conn, "SELECT * FROM visi_misi LIMIT 1");

if (mysqli_num_rows($cek) > 0) {

    // Update data
    mysqli_query($conn, "UPDATE visi_misi SET
        visi='$visi',
        misi='$misi'
    ");

} else {

    // Simpan data baru
    mysqli_query($conn, "INSERT INTO visi_misi(visi, misi)
    VALUES('$visi','$misi')");

}

header("Location: profil_visimisi.php?status=sukses");
exit;
?>