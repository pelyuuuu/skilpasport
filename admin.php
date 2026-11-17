<?php
session_start(); include 'koneksi.php';
if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO admin (username, nama, password) VALUES ('$_POST[username]', '$_POST[nama]', '$_POST[password]')");
    header("Location: admin.php");
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="password" placeholder="Password" required>
    <button name="simpan">Tambah Admin</button>
</form>