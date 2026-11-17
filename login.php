<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' And nama='$nama'  AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['admin'] = $data['nama'];
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="text" name="nama" placeholder="Nama" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
    <br>
    <p>Belum punya akun? <a href="register.php">Daftar di sini
</a>
</p>
</body>
</html>