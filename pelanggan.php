<?php
session_start(); include 'koneksi.php';
if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO pelanggan (nama, alamat, nomor_telepon) VALUES ('$_POST[nama]', '$_POST[alamat]', '$_POST[telepon]')");
    header("Location: pelanggan.php");
}
?>
<form method="POST">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="text" name="telepon" placeholder="No Telepon" required>
    <button name="simpan">Tambah Pelanggan</button>
</form>