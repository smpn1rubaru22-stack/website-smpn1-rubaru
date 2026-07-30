<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kelola Profil</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card-menu{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.card-menu:hover{
    transform:translateY(-5px);
}

.card-menu a{
    text-decoration:none;
}

.icon{
    font-size:45px;
    color:#0d6efd;
}

</style>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

<div class="container py-5">

<h2 class="mb-4">
Kelola Profil Website
</h2>

<div class="row g-4">

<div class="col-md-3">

<div class="card card-menu text-center p-4">

<div class="icon">
<i class="fa-solid fa-user-tie"></i>
</div>

<h5 class="mt-3">
Kepala Sekolah
</h5>

<a href="profil_kepsek.php" class="btn btn-primary mt-3">
Kelola
</a>

</div>

</div>

<div class="col-md-3">

<div class="card card-menu text-center p-4">

<div class="icon">
<i class="fa-solid fa-bullseye"></i>
</div>

<h5 class="mt-3">
Visi & Misi
</h5>

<a href="profil_visimisi.php" class="btn btn-primary mt-3">
Kelola
</a>

</div>

</div>

<div class="col-md-3">

<div class="card card-menu text-center p-4">

<div class="icon">
<i class="fa-solid fa-users"></i>
</div>

<h5 class="mt-3">
Guru & TU
</h5>

<a href="profil_pegawai.php" class="btn btn-primary mt-3">
Kelola
</a>

</div>

</div>

<div class="col-md-3">

<div class="card card-menu text-center p-4">

<div class="icon">
<i class="fa-solid fa-sitemap"></i>
</div>

<h5 class="mt-3">
Struktur Organisasi
</h5>

<a href="struktur_organisasi.php" class="btn btn-primary mt-3">
Kelola
</a>

</div>

</div>

</div>

<div class="mt-4">

<a href="dashboard.php" class="btn btn-secondary">
← Kembali Dashboard
</a>

</div>

</div>

</body>
</html>