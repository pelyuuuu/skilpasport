<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$nama_produk', '$harga', '$stok')");
    header("location:produk.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Membuat Aplikasi Kasir</title>
</head>
<body>
    <h2>Data Produk</h2>
    
    <h3>Tambah Produk Baru</h3>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Nama Produk</td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" placeholder=""></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" placeholder=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="tambah">Simpan</button></td>
            </tr>
        </table>
    </form>
  </table>
</body>
</html>
