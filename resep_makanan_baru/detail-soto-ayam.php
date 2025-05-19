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
    <title>Detail Resep Soto Ayam</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.html" class="navbar-brand">
                <img src="assets/logo.png" alt="CookWith Logo" class="logo-img">
                <span class="website-name">CookWith</span>
            </a>
        </div>
        <ul class="nav-menu">
            <li><a href="index.html">Beranda</a></li>
            <li><a href="resep.php" class="active">Resep</a></li>
            <li><a href="tentang.php">Tentang</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        <?php endif; ?>
        </ul>
    </nav>

    <div class="container">
        <div class="recipe-detail">
            <div class="recipe-image">
                <img src="assets/soto_ayam.jpg" alt="Soto Ayam">
            </div>
    
            <div class="recipe-content">
                <h1>Soto Ayam</h1>
    
                <div class="ingredients">
                    <h2>Bahan-bahan:</h2>
                    <ul>
                        <li>1 ekor ayam kampung, potong menjadi 4 bagian</li>
                        <li>2 liter air</li>
                        <li>2 batang serai, memarkan</li>
                        <li>2 lembar daun salam</li>
                        <li>2 lembar daun jeruk</li>
                        <li>1 ruas jari lengkuas, memarkan</li>
                        <li>1 sdt garam</li>
                        <li>1/2 sdt lada putih bubuk</li>
                        <li>1 sdm gula pasir</li>
                        <li>Minyak untuk menumis</li>
                    </ul>
                </div>
    
                <div class="spices">
                    <h2>Bumbu Halus:</h2>
                    <ul>
                        <li>5 siung bawang merah</li>
                        <li>3 siung bawang putih</li>
                        <li>5 butir kemiri, sangrai</li>
                        <li>1 ruas jari kunyit, bakar</li>
                        <li>1 sdt ketumbar</li>
                    </ul>
                </div>
    
                <div class="steps">
                    <h2>Cara Membuat:</h2>
                    <ol>
                        <li>Rebus ayam dalam 2 liter air hingga mendidih dan ayam matang. Angkat ayam, tiriskan, dan suwir-suwir dagingnya. Sisihkan kaldu.</li>
                        <li>Panaskan sedikit minyak dalam wajan, tumis bumbu halus bersama serai, daun salam, daun jeruk, dan lengkuas hingga harum dan matang.</li>
                        <li>Masukkan tumisan bumbu ke dalam kaldu ayam. Tambahkan garam, lada putih, dan gula pasir. Masak dengan api kecil selama 15-20 menit agar bumbu meresap.</li>
                        <li>Siapkan mangkuk saji, letakkan suwiran ayam, soun, taoge, dan telur rebus. Siram dengan kuah soto panas. Taburi dengan bawang goreng dan daun seledri cincang.</li>
                        <li>Sajikan soto ayam dengan pelengkap seperti kerupuk, sambal, dan perasan jeruk nipis sesuai selera.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        /* Background image dengan efek overlay */
        body {
            font-family: 'Arial', sans-serif;
            background: url('assets/food_background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            position: relative;
        }
    
        /* Overlay agar teks lebih terbaca */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Efek gelap transparan */
            z-index: -1;
        }
    
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: rgba(255, 255, 255, 0.9); /* Latar putih transparan */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    
        /* Mengatur tampilan gambar di kiri dan resep di kanan */
        .recipe-detail {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
    
        .recipe-image {
    flex: 1;
    max-width: 300px;
    margin-top: 120px; /* Sesuaikan dengan kebutuhan */
        }

    
        .recipe-image img {
            width: 100%;
            border-radius: 10px;
            object-fit: cover;
        }
    
        .recipe-content {
            flex: 2;
            color: #333;
        }
    
        .recipe-content h1 {
            color: #e67e22;
            margin-top: 0;
        }
    
        h2 {
            color: orange;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    
        .ingredients ul, .spices ul, .steps ol {
            margin: 10px 0;
            padding-left: 20px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    
        .ingredients li, .spices li, .steps li {
            margin-bottom: 8px;
        }
    </style>
    