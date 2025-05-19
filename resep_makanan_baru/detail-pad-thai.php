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
    <title>Detail Resep - Pad Thai</title>
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
                <img src="assets/pad-thai1.jpg" alt="Pad Thai">
            </div>
            
            <div class="recipe-content">
                <h1>Pad Thai</h1>
                
                <div class="ingredients">
                    <h2>Bahan-bahan:</h2>
                    <ul>
                        <li>200 gram mie rice noodle (mie beras, bisa beli di supermarket Asia)</li>
                        <li>2 sendok makan minyak sayur</li>
                        <li>200 gram dada ayam fillet, iris tipis (atau bisa pakai udang atau tahu untuk versi vegetarian)</li>
                        <li>2 butir telur</li>
                        <li>3 siung bawang putih, cincang halus</li>
                        <li>1 buah wortel, serut panjang</li>
                        <li>100 gram tauge segar</li>
                        <li>2 batang daun bawang, iris tipis</li>
                        <li>1 sendok makan kacang tanah, sangrai dan cincang kasar</li>
                        <li>1 sendok makan gula merah serut</li>
                        <li>2 sendok makan kecap ikan</li>
                        <li>1 sendok makan saus tamarind (atau bisa diganti dengan air jeruk nipis dan gula jika tidak tersedia)</li>
                        <li>1 sendok makan kecap manis</li>
                        <li>1/2 sendok teh garam</li>
                        <li>1 sendok teh cabai bubuk (sesuai selera)</li>
                        <li>Jeruk nipis, potong-potong</li>
                    </ul>
                </div>

                <div class="steps">
                    <h2>Cara Membuat:</h2>
                    <ol>
                        <li>Rebus mie rice noodle dalam air panas selama sekitar 5-7 menit hingga lembut, lalu tiriskan dan sisihkan.</li>
                        <li>Campurkan kecap ikan, saus tamarind, kecap manis, gula merah, garam, dan cabai bubuk dalam mangkuk kecil. Aduk rata dan sisihkan.</li>
                        <li>Panaskan minyak sayur di wajan besar atau wok dengan api sedang. Masukkan bawang putih cincang dan tumis hingga harum.</li>
                        <li>Tambahkan ayam yang sudah diiris tipis, masak hingga ayam matang dan berwarna kecoklatan. Jika menggunakan udang, masukkan udang dan masak hingga berubah warna.</li>
                        <li>Geser ayam ke sisi wajan, lalu pecahkan telur ke bagian wajan kosong. Aduk telur hingga setengah matang, kemudian campurkan dengan ayam.</li>
                        <li>Masukkan mie rice noodle yang sudah direbus, wortel serut, tauge, dan daun bawang ke dalam wajan. Tuangkan campuran saus yang sudah disiapkan tadi. Aduk rata hingga semua bahan tercampur dan mie terlapisi saus dengan merata.</li>
                        <li>Masak selama 2-3 menit hingga mie terasa panas dan bumbu meresap.</li>
                        <li>Sajikan Pad Thai dalam piring dan taburi dengan kacang tanah cincang, potongan jeruk nipis, serta tambahan tauge dan daun bawang jika suka.</li>
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
