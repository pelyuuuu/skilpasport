<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard Kasir</title></head>
<body>
    <h2>Selamat Datang, <?php echo $_SESSION['admin']; ?></h2>
    <a href="produk.php">Data Produk</a> |
    <a href="pelanggan.php">Data Pelanggan</a> |
    <a href="kasir.php">Transaksi Kasir</a> |
    <a href="logout.php">Logout</a>

    <h3>Produk Terbaru</h3>
    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th></tr>
        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($row = mysqli_fetch_array($data)) {
            echo "<tr>
                <td>$row[produkID]</td>
                <td>$row[nama]</td>
                <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                <td>$row[stok]</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>