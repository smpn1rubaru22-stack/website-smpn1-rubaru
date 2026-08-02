<?php
include "config/koneksi.php";

$id = (int)$_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM layanan WHERE id='$id'");
$layanan = mysqli_fetch_assoc($data);

if(!$layanan){
    die("Data layanan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= htmlspecialchars($layanan['judul']); ?> | SMP Negeri 1 Rubaru</title>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<!-- DETAIL LAYANAN -->

<section class="detail-layanan">

<div class="detail-layanan-page">

<div class="detail-card">

<div class="detail-header">

<h1><?= htmlspecialchars($layanan['judul']); ?></h1>

<div class="line"></div>

<p>
<?= nl2br(htmlspecialchars($layanan['deskripsi'])); ?>
</p>

</div>



<div class="layanan-section">

<h3>Persyaratan Layanan</h3>

<ul>

<?php
$persyaratan = preg_split('/\r\n|\r|\n/', $layanan['persyaratan']);

echo "<ul>";

foreach($persyaratan as $item){

    $item = trim($item);

    if($item=="") continue;

    if(preg_match('/^[A-Za-z]\./',$item)){
        echo "</ul>";
        echo "<h4 class='subjudul'>".htmlspecialchars($item)."</h4>";
        echo "<ul>";
    }else{
        echo "<li>".htmlspecialchars($item)."</li>";
    }
}

echo "</ul>";
?>

</ul>

</div>



<div class="layanan-section">

<h3>Prosedur Pelayanan</h3>

<ol>

<?php
$pelayanan = preg_split('/\r\n|\r|\n/', $layanan['persyaratan']);

echo "<ul>";

foreach($persyaratan as $item){

    $item = trim($item);

    if($item=="") continue;

    if(preg_match('/^[A-Za-z]\./',$item)){
        echo "</ul>";
        echo "<h4 class='subjudul'>".htmlspecialchars($item)."</h4>";
        echo "<ul>";
    }else{
        echo "<li>".htmlspecialchars($item)."</li>";
    }
}

echo "</ul>";
?>

</ol>

</div>



<div class="layanan-box">

<h4>⏰ Waktu Pelayanan</h4>

<p>
<?= htmlspecialchars($layanan['waktu_pelayanan']); ?>
</p>

</div>



<div class="layanan-box">

<h4>📄 Produk Layanan</h4>

<p>
<?= nl2br(htmlspecialchars($layanan['produk_layanan'])); ?>
</p>

</div>



<div class="layanan-box">

<h4>📍 Lokasi Pelayanan</h4>

<p>
SMP Negeri 1 Rubaru
</p>

</div>



<div class="info-box">

<strong>💰 Tarif Layanan</strong>

<p>
<?= htmlspecialchars($layanan['tarif_layanan']); ?>
</p>

</div>



<a href="pelayanan.php" class="btn-kembali">

← Kembali ke Jenis Layanan

</a>

</div>

</div>

</section>

</body>

</html>