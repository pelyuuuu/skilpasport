<?php
session_start();
include 'koneksi.php';


if (isset($_SESSION['adminID'])) {
    header("Location: index.php");
    exit;
}

$error = "";
$sukses = "";

if (isset($_POST['register'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    if (strlen($password) < 6) {
        $error = "Password wajib diisi!";
    } 
    else {
        
        $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
        if (mysqli_num_rows($cek) > 0) {
            $error = "Username '$username' sudah dipakai, coba username lain!";
        } else {
            
            $simpan = mysqli_query($koneksi, "INSERT INTO admin (username, nama, password) VALUES ('$username', '$nama', '$password')");
            
            if ($simpan) {
                $sukses = "Registrasi berhasil! Silahkan <a href='login.php'>Login di sini</a>";
            } else {
                $error = "Gagal registrasi, coba lagi!";
            }
        }
    }
}
?>

<body>
    <div class="register-box">
        <h2>APLIKASI KASIR</h2>
        <p>Daftar Admin</p>

        <?php if ($error != "") { echo "<div class='error'>$error</div>"; } ?>
        <?php if ($sukses != "") { echo "<div class='sukses'>$sukses</div>"; } ?>

        <form method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">DAFTAR</button>
        </form>

        <div class="link-login">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>