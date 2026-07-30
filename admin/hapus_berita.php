<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require_once "../config/koneksi.php";


$id = $_GET['id'];


$query = mysqli_query($conn, 
"DELETE FROM berita WHERE id='$id'");


header("Location: berita.php");

exit;

?>