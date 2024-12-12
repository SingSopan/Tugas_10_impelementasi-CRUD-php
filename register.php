<?php
require 'config.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username sudah terdaftar!";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
        if ($insert) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Gagal mendaftarkan user!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Registrasi User</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Daftar</button>
</form>

<?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>
</body>
</html>
