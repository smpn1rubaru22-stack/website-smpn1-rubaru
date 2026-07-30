<?php
include "config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn, 
"SELECT * FROM layanan WHERE id='$id'");

$layanan = mysqli_fetch_assoc($data);

if(!$layanan){
    die("Layanan tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Layanan SPMB | SMP Negeri 1 Rubaru</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>


<body>


<!-- DETAIL LAYANAN -->

<section class="detail-layanan">


<div class="detail-layanan-page">

<div class="detail-card">


<div class="detail-header">


<h1>Layanan SMPB</h1>

<div class="line"></div>


<p>
Pelayanan Sistem Penerimaan Murid Baru (SPMB) 
SMP Negeri 1 Rubaru untuk membantu calon peserta didik 
dalam proses pendaftaran dan informasi penerimaan murid baru.
</p>

</div>



<div class="layanan-section">

<h3>Persyaratan Layanan</h3>

<ul>
<li>Memakai pakaian yang sopan dan rapi; </li>
<li>Membawa Fotokopi Akte Kelahiran;</li>
<li>Membawa Fotokopi kartu keluarga;</li>
<li>Membawa fptpkopiijazah atau surat keterangan lulus;</li>
<li>Membawa pas foto berwarna 3x4 sebanya 4 lembar;</li>
<li>Mengisi formulir pendaftaran yang telah disediakan.</li>
</ul>

</div>



<div class="layanan-section">

<h3>Prosedur Pelayanan</h3>

<ol>
<li>Pemohon menyerahkan berkas persyaratan pendaftaran murid baru </li>
<li>Petugas mengecek kelengkapan berkas </li>
<li>Petugas mengisi buku daftar Pendaftaran Murid Baru </li> 
<li>Petugas memproses Penerimaan Murid Baru </li>
<li>Apabila pengisian formulir dan penyerahan berkas telah selesai, 
    petugas memberikan informasi tentang jadwal pengumuman hasil seleksi 
    dan jadwal pendaftaran ulang yang telah ditetapkan </li>
<li>Pemohon kembali untuk melakukan verifikasi pendaftaran ulang 
    pada tanggal yang telah ditetapkan. </li>
<li>Pemohon mengisi Kuesioner Survei Kepuasan Masyarakat </li> 
<li>“Selesai” 
</ol>

</div>



<div class="layanan-box">

<h4>⏰ Waktu Pelayanan</h4>

<p>
Sesuai jadwal pelaksanaan Sistem Penerimaan Murid Baru.
</p>

</div>



<div class="layanan-box">

<h4>📄 Produk Layanan</h4>

<p>
Informasi penerimaan murid baru dan hasil proses seleksi peserta didik.
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
    <p>Tidak dikenakan tarif (Gratis).</p>
</div>




<a href="pelayanan.php" class="btn-kembali">
← Kembali ke Jenis Layanan
</a>


</div>

</div>


</section>


</body>

</html>