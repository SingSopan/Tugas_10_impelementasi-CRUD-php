<?php
require 'config.php';

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div class="header">
    Selamat datang, <?php echo $_SESSION['username']; ?>!
    <a href="logout.php">Logout</a>
</div>
<h2>Daftar Buku</h2>
<a class="main-link" href="add_book.php">Tambah Buku</a>
<table>
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Tahun</th>
        <th>Aksi</th>
    </tr>
    <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $row['title']; ?></td>
        <td><?= $row['author']; ?></td>
        <td><?= $row['year']; ?></td>
        <td>
            <a class="action-link" href="edit_book.php?id=<?= $row['id']; ?>">Edit</a>
            <a class="action-link" href="delete_book.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php $i++; endwhile; ?>
</table>
</div>
</body>
</html>