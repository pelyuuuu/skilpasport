<?php
include 'koneksi.php';

$nama = $_POST['Nama'];
$alamat = $_POST[Alamat];
$nomor_telepon = $_POST[Nomor_Telepon];
$role = $_POST[Role];

mysqli_query($koneksi, "INSERT INTO ukkKasir (nama, alamat, nomor_telepon)");
VALUES
('$nama','$alamat','$nomor_telepon')");

 header("location:daftar.php");
 ?>