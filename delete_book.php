<?php
require 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM books WHERE id=$id");
if ($delete) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus buku.";
}
