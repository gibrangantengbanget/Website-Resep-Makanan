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
    <title>Detail Resep - Sushi</title>
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
                <img src="assets/sushi1.jpg" alt="Sushi">
            </div>
            
            <div class="recipe-content">
                <h1>Sushi Rolls</h1>
                
                <div class="ingredients">
                    <h2>Bahan-bahan:</h2>
                    <ul>
                        <li>200 gram beras sushi (beras ketan Jepang)</li>
                        <li>2 sendok makan cuka beras</li>
                        <li>1 sendok makan gula</li>
                        <li>1/2 sendok teh garam</li>
                        <li>4 lembar nori (rumput laut kering)</li>
                        <li>150 gram ikan salmon segar, potong tipis (atau tuna, atau pilihan ikan lainnya)</li>
                        <li>1 buah timun, iris panjang tipis</li>
                        <li>1 buah alpukat, iris panjang tipis</li>
                        <li>Wasabi (sesuai selera)</li>
                        <li>Saos soya (kecap asin) untuk cocolan</li>
                    </ul>
                </div>

                <div class="steps">
                    <h2>Cara Membuat:</h2>
                    <ol>
                        <li>Cuci beras sushi dengan air dingin hingga airnya jernih, kemudian tiriskan. Masak beras sesuai petunjuk pada kemasan (bisa menggunakan rice cooker atau kompor biasa).</li>
                        <li>Setelah beras matang, campurkan cuka beras, gula, dan garam dalam sebuah mangkuk kecil. Aduk rata hingga gula dan garam larut. Tuangkan campuran cuka ini ke dalam beras yang sudah matang dan aduk rata. Biarkan beras sedikit mendingin hingga suhu ruang.</li>
                        <li>Siapkan alas bambu untuk menggulung sushi (makisu). Letakkan selembar nori di atasnya, dengan sisi mengilap menghadap ke bawah.</li>
                        <li>Ambil sejumput beras sushi dan ratakan di atas nori, tinggalkan sekitar 2 cm di bagian atas nori tanpa beras.</li>
                        <li>Letakkan irisan ikan salmon, timun, dan alpukat di bagian bawah beras. Jika suka, tambahkan sedikit wasabi di atas bahan-bahan tersebut.</li>
                        <li>Gulung sushi dengan hati-hati menggunakan mat bambu, pastikan gulungan rapat. Setelah itu, basahi sedikit ujung nori yang kosong dengan air, lalu rapatkan gulungan agar nori menempel.</li>
                        <li>Potong gulungan sushi menjadi beberapa bagian menggunakan pisau tajam yang dibasahi air. Potong menjadi 6-8 potong per gulungan.</li>
                        <li>Sajikan sushi dengan kecap asin (soya sauce) dan sedikit wasabi di sampingnya.</li>
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
            font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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
