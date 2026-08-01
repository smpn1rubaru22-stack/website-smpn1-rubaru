<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config/koneksi.php";

// Ambil data navbar
$query = mysqli_query($conn, "SELECT * FROM navbar LIMIT 1");
$data = mysqli_fetch_assoc($query);

$id = $data['id'];

$nama_website = mysqli_real_escape_string($conn, $_POST['nama_website']);
$subjudul      = mysqli_real_escape_string($conn, $_POST['subjudul']);

$logo = $data['logo'];

// Jika upload logo baru
if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {

    // Folder tujuan
    $folder = "../upload/logo/";

    // Buat folder jika belum ada
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Hapus logo lama (jika ada)
    if (!empty($data['logo']) && file_exists($folder . $data['logo'])) {
        unlink($folder . $data['logo']);
    }

    // Nama file baru
    $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
    $logo = time() . "." . strtolower($ext);

    // Upload file
    move_uploaded_file(
        $_FILES['logo']['tmp_name'],
        $folder . $logo
    );
}

// Update database
$sql = "UPDATE navbar SET
        logo='$logo',
        nama_website='$nama_website',
        subjudul='$subjudul'
        WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

    header("Location: navbar.php?status=sukses");

} else {

    echo "Gagal menyimpan data : " . mysqli_error($conn);

}
?>