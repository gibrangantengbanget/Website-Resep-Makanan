<?php
include 'koneksi.php';
$sql = "SELECT * FROM resep";
$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Makanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php" class="navbar-brand">
                <img src="assets/logo.png" alt="CookWith Logo" class="logo-img">
                <span class="website-name">CookWith</span>
            </a>
        </div>
       
        <ul class="nav-menu">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="resep.php">Resep</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <li><a href="upload.php">Upload Resep</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        <?php endif; ?>
            
        </ul>
    </nav>

    <div class="wrapper">
    <a href="detail-nasi-goreng.php" class="card-link">
                <div class="card">
                    <div class="card-image" style="background-image: url('assets/nasi_goreng.jpg');"></div>
                    <h1>Nasi Goreng Special</h1>
                    <div class="card-hover"></div>
                </div>
            </a>

            <a href="detail-soto-ayam.php" class="card-link">
                <div class="card">
                    <div class="card-image" style="background-image: url('assets/soto_ayam.jpg');"></div>
                    <h1>Soto Ayam</h1>
                    <div class="card-hover"></div>
                </div>
            </a>

            <a href="detail-rendang.php" class="card-link">
        <div class="card">
            <div class="card-image" style="background-image: url('assets/rendang1.jpg');"></div>
            <h1>Rendang</h1>
            <div class="card-hover"></div>
        </div>
    </a>
    
    <a href="detail-sushi.php" class="card-link">
        <div class="card">
            <div class="card-image" style="background-image: url('assets/sushi1.jpg');"></div>
            <h1>Sushi</h1>
            <div class="card-hover"></div>
        </div>
    </a>
    
    <a href="detail-tacos.php" class="card-link">
        <div class="card">
            <div class="card-image" style="background-image: url('assets/tacos1.jpg');"></div>
            <h1>Tacos</h1>
            <div class="card-hover"></div>
        </div>
    </a>

    <a href="detail-pad-thai.php" class="card-link">
        <div class="card">
            <div class="card-image" style="background-image: url('assets/pad-thai1.jpg');"></div>
            <h1>Pad Thai</h1>
            <div class="card-hover"></div>
        </div>
    </a>

    <a href="detail-spaghetti-carbonara.php" class="card-link">
        <div class="card">
            <div class="card-image" style="background-image: url('assets/spaghetti-carbonara.jpg');"></div>
            <h1>Spaghetti Carbonara</h1>
            <div class="card-hover"></div>
        </div>
    </a>
    </div>
    <div class="wrapper">
        <?php while ($row = $result->fetch_assoc()): ?>
            <a href="detail-resep.php?id=<?= $row['id'] ?>" class="card-link">
                <div class="card">
                    <div class="card-image" style="background-image: url('<?= $row['gambar'] ?>');"></div>
                    <h1><?= $row['judul'] ?></h1>
                    <div class="card-hover"></div>
                </div>
            </a>
        <?php endwhile; ?>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('assets/food_background.jpg') no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; 
            background-attachment: fixed; 
        }
    </style>
</body>
</html>