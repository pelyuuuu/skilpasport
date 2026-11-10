<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ukkKasir";

$koneksi = mysqli_connect($host,$user,$password,$db);

if (!$koneksi) {
    die("Gagal Terhubung: ".mysqli_connect_error()); 
}
?>
