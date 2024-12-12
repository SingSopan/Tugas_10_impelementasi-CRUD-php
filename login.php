<?php
require 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($query) === 1) {
        $user = mysqli_fetch_assoc($query);
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "User tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Login User</h2>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Masuk</button>
</form>

<?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

<p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
</div>
</body>
</html>

