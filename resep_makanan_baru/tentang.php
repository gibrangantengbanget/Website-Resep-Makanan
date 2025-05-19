<?php
include 'koneksi.php';
$sql = "SELECT * FROM resep";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php" class="navbar-brand">
                <img src="assets/logo.png" alt="CookWith Logo" class="logo">
                <span class="website-name">CookWith</span>
            </div>
        <!--<div class="search-bar">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Cari resep...">
                <button type="submit">Cari</button>
            </form>
        </div>-->
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="resep.php">Resep</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="upload.php">Upload Resep</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        <?php endif; ?>
        </ul>
    </nav>

    <div class="container">
        <h1>Tentang Website Ini</h1>
        <p>Website ini dibuat untuk menyediakan berbagai resep makanan dari seluruh dunia. Anda dapat mencari resep berdasarkan nama atau bahan yang digunakan.</p>
    </div>
</body>
</html>