<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {

    // DATABASE XAMPP
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "db_smpn1rubaru";

} else {

    // DATABASE HOSTING
    $host = "localhost";
    $user = "u860157627_usr_zzZltosJ";
    $password = 'Smpn1rubaru@21';
    $database = "u860157627_db_zzzzz";
}

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>