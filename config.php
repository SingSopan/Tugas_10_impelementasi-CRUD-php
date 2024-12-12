<?php
$host = "localhost";
$user = "root";      // ganti sesuai user DB Anda
$pass = "";          // ganti sesuai password DB Anda
$db   = "library_db"; // nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

session_start();
?>
