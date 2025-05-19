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
    <title>Detail Resep</title>
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
                <img src="assets/rendang1.jpg" alt="Rendang">
            </div>
            
            <div class="recipe-content">
                <h1>Rendang</h1>
                
                <div class="ingredients">
                    <h2>Bahan-bahan:</h2>
                    <ul>
                        <li>1 kg daging sapi.</li>
                        <li>1 liter santan kental dari 3 butir kelapa (perasan pertama tanpa air).</li>
                        <li>550 gram kelapa parut, disangrai sampai kecokelatan.</li>
                        <li>5 lembar daun salam.</li>
                        <li>1 lembar daun kunyit.</li>
                        <li>10 lembar daun jeruk.</li>
                        <li>5 batang serai.</li>
                        <li>1/2 batang kayu manis.</li>
                        <li>3 butir cengkeh.</li>
                        <li>2 sdt garam.</li>
                        <li>1 buah kembang lawang.</li>
                        <li>65 gram bawang putih.</li>
                        <li>125 gram bawang merah.</li>
                        <li>15 gram kunyit.</li>
                        <li>35 gram jahe.</li>
                        <li>75 gram lengkuas.</li>
                        <li>35 gram kemiri.</li>
                        <li>1/2 sdt lada bubuk.</li>
                        <li>1 sdt ketumbar.</li>
                        <li>1 buah kapulaga.</li>
                        <li>1/4 buah pala.</li>
                    </ul>
                </div>

                <div class="steps">
                    <h2>Cara Membuat:</h2>
                    <ol>
                        <li>Pertama-tama, tumis bumbu halus dan kelapa parut sangrai. Aduk rata.</li>
                        <li>Kemudian, masukkan daun salam, daun jeruk, daun kunyit, dan serai. Masak hingga wangi.</li>
                        <li>Setelah itu, masukkan daging. Aduk rata.</li>
                        <li>Tuang santan. Aduk rata.</li>
                        <li>Masak rendang dengan api kecil hingga rendang mengering. Rendang daging sapi siap kamu sajikan untuk acara spesial.</li>
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
</body>
</html>