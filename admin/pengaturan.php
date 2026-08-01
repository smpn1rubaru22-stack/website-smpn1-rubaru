<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pengaturan Website</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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

.icon{
    font-size:45px;
    color:#0d6efd;
}

</style>

</head>
<body>


<div class="container py-5">

    <h2 class="mb-4">Pengaturan Website</h2>

    <div class="row g-4">

        <!-- Slider -->
        <div class="col-md-4">
            <div class="card card-menu text-center p-4">

                <div class="icon">
                    <i class="fa-solid fa-images"></i>
                </div>

                <h5 class="mt-3">Slider Beranda</h5>

                <a href="slider.php" class="btn btn-primary mt-3">
                    Kelola
                </a>

            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="col-md-4">
            <div class="card card-menu text-center p-4">

                <div class="icon">
                    <i class="fa-solid fa-address-book"></i>
                </div>

                <h5 class="mt-3">Informasi Kontak</h5>

                <a href="kontak.php" class="btn btn-primary mt-3">
                    Kelola
                </a>

            </div>
        </div>

        <!-- Navbar -->
        <div class="col-md-4">
            <div class="card card-menu text-center p-4">

                <div class="icon">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <h5 class="mt-3">Navbar</h5>

                <a href="navbar.php" class="btn btn-primary mt-3">
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