<?php

$host = "localhost";
$user = "u860157627_usr_zzZltosJ";
$pass = 'Smpn1rubaru@21';
$db   = "u860157627_db_zzZltosJ";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>