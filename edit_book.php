<?php
require 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$book = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = (int)$_POST['year'];

    $update = mysqli_query($conn, "UPDATE books SET title='$title', author='$author', year=$year WHERE id=$id");
    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal mengupdate data buku!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Edit Buku</h2>
<form method="post">
    <input type="text" name="title" value="<?= $book['title']; ?>" required>
    <input type="text" name="author" value="<?= $book['author']; ?>" required>
    <input type="number" name="year" value="<?= $book['year']; ?>" required>
    <button type="submit" name="update">Update</button>
</form>
<?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
</div>
</body>
</html>
