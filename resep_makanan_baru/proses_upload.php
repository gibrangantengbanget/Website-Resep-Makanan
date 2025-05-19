<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$cara = $_POST['cara'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$lokasi = "img/" . $gambar;

move_uploaded_file($tmp, $lokasi);

$sql = "INSERT INTO resep (nama, deskripsi, cara, gambar) VALUES ('$nama', '$deskripsi', '$cara', '$gambar')";
$koneksi->query($sql);

header("Location: resep.php");
?>
