<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

if (isset($_POST['bayar'])) {
    $pelangganID = $_POST['pelangganID'];
    $produkID = $_POST['produkID'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date('Y-m-d');

    
    $p = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE produkID='$produkID'"));
    $harga = $p['harga'];
    $subtotal = $harga * $jumlah;
    $total = $subtotal;

    
    mysqli_query($koneksi, "INSERT INTO penjualan (tanggal_penjualan, total_harga, pelangganpelangganID) VALUES ('$tanggal', '$total', '$pelangganID')");
    $penjualanID = mysqli_insert_id($koneksi);

    
    mysqli_query($koneksi, "INSERT INTO detail_penjualan (jumlah_produk, subtotal, penjualanpenjualanID, produkprodukID) VALUES ('$jumlah', '$subtotal', '$penjualanID', '$produkID')");

  
    mysqli_query($koneksi, "UPDATE produk SET stok = stok - $jumlah WHERE produkID='$produkID'");

    echo "<script>alert('Transaksi Berhasil! Total: Rp $total'); window.location='kasir.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<body>
    <a href="index.php">Kembali</a>
    <h2>Transaksi Kasir</h2>
    <form method="POST">
        <label>Pelanggan:</label><br>
        <select name="pelangganID" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php
            $plg = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            while ($r = mysqli_fetch_array($plg)) {
                echo "<option value='$r[pelangganID]'>$r[nama]</option>";
            }
            ?>
        </select><br><br>

        <label>Produk:</label><br>
        <select name="produkID" required>
            <option value="">-- Pilih Produk --</option>
            <?php
            $prd = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($r = mysqli_fetch_array($prd)) {
                echo "<option value='$r[produkID]'>$r[nama] - Rp $r[harga] (Stok: $r[stok])</option>";
            }
            ?>
        </select><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" value="1" min="1" required><br><br>
        <button type="submit" name="bayar">Bayar</button>
    </form>

    <h3>Riwayat Penjualan</h3>
    <table border="1" cellpadding="8">
        <tr><th>ID</th><th>Tanggal</th><th>Pelanggan</th><th>Total</th></tr>
        <?php
        $q = mysqli_query($koneksi, "SELECT penjualan.*, pelanggan.nama as nama_plg FROM penjualan JOIN pelanggan ON penjualan.pelangganpelangganID = pelanggan.pelangganID ORDER BY penjualanID DESC");
        while ($row = mysqli_fetch_array($q)) {
            echo "<tr><td>$row[penjualanID]</td><td>$row[tanggal_penjualan]</td><td>$row[nama_plg]</td><td>Rp $row[total_harga]</td></tr>";
        }
        ?>
    </table>
</body>
</html>