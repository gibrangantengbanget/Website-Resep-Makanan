<?php
include 'koneksi.php'; // Menginclude file koneksi database

$query = $_GET['query']; // Mengambil kata kunci pencarian dari URL

$sql = "SELECT * FROM resep WHERE judul LIKE '%$query%'"; // Query pencarian
$result = $conn->query($sql); // Menjalankan query

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='resep-item'>";
        echo "<h2>" . $row["judul"] . "</h2>";
        echo "<p><strong>Bahan:</strong> " . $row["bahan"] . "<gambar/p>";
        echo "<p><strong>Langkah:</strong> " . $row["cara"] . "</p>";
        echo "<img src='images/" . $row["gambar"] . "' alt='" . $row["judul"] . "'>";
        echo "</div>";
    }
} else {
    echo "Tidak ada hasil yang ditemukan.";
}

$conn->close(); // Menutup koneksi database
?>