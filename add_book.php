<?php
require 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = (int)$_POST['year'];

    $insert = mysqli_query($conn, "INSERT INTO books (title, author, year) VALUES ('$title', '$author', $year)");
    if ($insert) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menambah buku!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Tambah Buku</h2>
<form method="post">
    <input type="text" name="title" placeholder="Judul Buku" required>
    <input type="text" name="author" placeholder="Penulis" required>
    <input type="number" name="year" placeholder="Tahun" required>
    <button type="submit" name="submit">Simpan</button>
</form>
<?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
</div>
</body>
</html>