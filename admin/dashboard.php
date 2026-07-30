<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container">

        <span class="navbar-brand">
            Admin Website SMPN 1 Rubaru
        </span>

        <a href="logout.php" class="btn btn-light">
            Logout
        </a>

    </div>
</nav>


<div class="container mt-5">

    <h3>
        Selamat Datang, 
        <?= $_SESSION['nama']; ?>
    </h3>

    <p>
        Silakan pilih menu pengelolaan website.
    </p>


    <div class="row mt-4">

        <div class="col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">

                    <h5>Berita</h5>

                    <a href="berita.php" class="btn btn-primary">
    Kelola
</a>

                </div>
            </div>
        </div>


        <div class="col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">

                    <h5>Profil</h5>

                    <a href="profil.php" class="btn btn-primary">
    Kelola
</a>

                </div>
            </div>
        </div>


        <div class="col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">

                    <h5>Layanan</h5>

                    <a href="layanan.php" class="btn btn-primary">
                        Kelola
                    </a>

                </div>
            </div>
        </div>


        <div class="col-md-3 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">

                    <h5>Kontak</h5>

                    <a href="#" class="btn btn-primary">
                        Kelola
                    </a>

                </div>
            </div>
        </div>


    </div>

</div>


</body>
</html>