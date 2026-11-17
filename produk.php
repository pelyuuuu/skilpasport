<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    mysqli_query($koneksi, "INSERT INTO produk (nama, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    header("Location: produk.php");
}


if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM produk WHERE produkID='$id'");
    header("Location: produk.php");
}
?>
<!DOCTYPE html>
<html>
<body>
    <a href="index.php">Kembali</a>
    <h2>Data Produk</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="number" name="stok" placeholder="Stok" required>
        <button type="submit" name="simpan">Tambah</button>
    </form>
    <br>
    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($row = mysqli_fetch_array($data)) {
            echo "<tr>
                <td>$row[produkID]</td><td>$row[nama]</td><td>$row[harga]</td><td>$row[stok]</td>
                <td><a href='?hapus=$row[produkID]' onclick=\"return confirm('Yakin hapus?')\">Hapus</a></td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>