<?php
include "../config/koneksi.php";

// Ambil data
$data = mysqli_query($conn,"SELECT * FROM kontak LIMIT 1");
$row = mysqli_fetch_assoc($data);

// Simpan
if(isset($_POST['simpan'])){

    $nama_website     = mysqli_real_escape_string($conn,$_POST['nama_website']);
    $footer_deskripsi = mysqli_real_escape_string($conn,$_POST['footer_deskripsi']);
    $copyright        = mysqli_real_escape_string($conn,$_POST['copyright']);

    $alamat           = mysqli_real_escape_string($conn,$_POST['alamat']);
    $telepon_wa       = mysqli_real_escape_string($conn,$_POST['telepon_wa']);
    $email            = mysqli_real_escape_string($conn,$_POST['email']);
    $jam_pelayanan    = mysqli_real_escape_string($conn,$_POST['jam_pelayanan']);

    $maps             = mysqli_real_escape_string($conn,$_POST['maps']);

    $tiktok         = mysqli_real_escape_string($conn,$_POST['tiktok']);
    $instagram        = mysqli_real_escape_string($conn,$_POST['instagram']);
    $youtube          = mysqli_real_escape_string($conn,$_POST['youtube']);

    $logo = $row['logo'];

if(!empty($_FILES['logo']['name'])){

    if($logo != "" && file_exists("../upload/logo/".$logo)){

        unlink("../upload/logo/".$logo);

    }

    $logo = time()."_".$_FILES['logo']['name'];

    move_uploaded_file(

        $_FILES['logo']['tmp_name'],

        "../upload/logo/".$logo

    );

}
    mysqli_query($conn,"
    UPDATE kontak SET

    logo='$logo',

    nama_website='$nama_website',

    footer_deskripsi='$footer_deskripsi',

    copyright='$copyright',

    alamat='$alamat',

    telepon_wa='$telepon_wa',

    email='$email',

    jam_pelayanan='$jam_pelayanan',

    maps='$maps',

    tiktok='$tiktok',

    instagram='$instagram',

    youtube='$youtube'

WHERE id='".$row['id']."'
    ");

    header("Location: kontak.php?status=sukses");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<title>Informasi Kontak</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">
Informasi Kontak Website
</h4>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">
Logo Website
</label>

<?php if(!empty($row['logo'])){ ?>

<div class="mb-2">

<img
src="../upload/logo/<?= $row['logo']; ?>"
width="90"
class="img-thumbnail">

</div>

<?php } ?>

<input
type="file"
name="logo"
class="form-control"
accept="image/*">

<small class="text-muted">
Kosongkan jika tidak ingin mengganti logo.
</small>

</div>

<div class="mb-3">
<label class="form-label">Nama Website</label>
<input
type="text"
name="nama_website"
class="form-control"
value="<?= $row['nama_website']; ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Deskripsi Footer</label>
<textarea
name="footer_deskripsi"
rows="4"
class="form-control"><?= $row['footer_deskripsi']; ?></textarea>
</div>

<div class="mb-4">
<label class="form-label">Copyright</label>
<input
type="text"
name="copyright"
class="form-control"
value="<?= $row['copyright']; ?>">
</div>

<hr>

<h5 class="text-primary mb-3">
Informasi Kontak
</h5>

<div class="mb-3">

<label class="form-label">
Alamat
</label>

<textarea
name="alamat"
rows="3"
class="form-control"><?= $row['alamat']; ?></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Telepon / WhatsApp
</label>

<input
type="text"
name="telepon_wa"
class="form-control"
value="<?= $row['telepon_wa']; ?>">

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
Email
</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $row['email']; ?>">

<div class="col-md-6 mb-3">

    <label class="form-label">
        Jam Pelayanan
    </label>

    <textarea
        name="jam_pelayanan"
        class="form-control"
        rows="3"><?= htmlspecialchars($row['jam_pelayanan']); ?></textarea>

</div>

<div class="mb-4">

<label class="form-label">
Google Maps (Embed)
</label>

<textarea
name="maps"
rows="5"
class="form-control"><?= $row['maps']; ?></textarea>

<small class="text-muted">
Tempel kode Embed Google Maps di sini.
</small>

</div>

<hr>

<h5 class="text-primary mb-3">
Media Sosial
</h5>

<div class="mb-3">

<label class="form-label">
tiktok
</label>

<input
type="text"
name="tiktok"
class="form-control"
value="<?= $row['tiktok']; ?>">

</div>

<div class="mb-3">

<label class="form-label">
Instagram
</label>

<input
type="text"
name="instagram"
class="form-control"
value="<?= $row['instagram']; ?>">

</div>

<div class="mb-4">

<label class="form-label">
YouTube
</label>

<input
type="text"
name="youtube"
class="form-control"
value="<?= $row['youtube']; ?>">

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan Perubahan

</button>

<a href="pengaturan.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['status']) && $_GET['status']=="sukses"){ ?>

<script>

Swal.fire({
    icon:'success',
    title:'Berhasil!',
    text:'Informasi kontak berhasil diperbarui.',
    confirmButtonColor:'#0d6efd'
});

</script>

<?php } ?>

</body>
</html>