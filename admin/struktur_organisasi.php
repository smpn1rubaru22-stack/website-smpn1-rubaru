<?php
include "../config/koneksi.php";

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM struktur_organisasi WHERE id=1"));

if(isset($_POST['simpan'])){

    if($_FILES['gambar']['name'] != ""){

        $gambar = time().'_'.$_FILES['gambar']['name'];

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "../upload/struktur/".$gambar
        );

        // hapus gambar lama
        if(!empty($data['gambar']) && file_exists("../upload/struktur/".$data['gambar'])){
            unlink("../upload/struktur/".$data['gambar']);
        }

        mysqli_query($conn,"
            UPDATE struktur_organisasi
            SET gambar='$gambar'
            WHERE id=1
        ");

        echo "<script>
        alert('Struktur organisasi berhasil diperbarui');
        window.location='struktur_organisasi.php';
        </script>";
    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Kelola Struktur Organisasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

    <h3 class="mb-4">Kelola Struktur Organisasi</h3>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">

            <label class="form-label">
                Upload Gambar Struktur Organisasi
            </label>

            <input
                type="file"
                name="gambar"
                class="form-control"
                required>

        </div>

        <?php if(!empty($data['gambar'])){ ?>

            <div class="mb-3">

                <img
                    src="../upload/struktur/<?= $data['gambar']; ?>"
                    class="img-fluid rounded shadow"
                    style="max-width:600px;">

            </div>

        <?php } ?>

        <button
            type="submit"
            name="simpan"
            class="btn btn-primary">

            Simpan

        </button>

        <a href="dashboard.php" class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

</body>
</html>