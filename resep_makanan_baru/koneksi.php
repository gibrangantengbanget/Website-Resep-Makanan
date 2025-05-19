<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_resep"; // Ganti dengan nama database yang sesuai

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
