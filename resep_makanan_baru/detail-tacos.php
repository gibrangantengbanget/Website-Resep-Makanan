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
    <title>Detail Resep - Tacos</title>
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
                <img src="assets/tacos1.jpg" alt="Tacos">
            </div>
            
            <div class="recipe-content">
                <h1>Tacos Daging</h1>
                
                <div class="ingredients">
                    <h2>Bahan-bahan:</h2>
                    <ul>
                        <li>300 gram daging sapi giling (atau ayam giling sesuai selera)</li>
                        <li>1 sendok makan minyak sayur</li>
                        <li>1/2 bawang bombay, cincang halus</li>
                        <li>2 siung bawang putih, cincang halus</li>
                        <li>1 sendok teh bubuk cabai</li>
                        <li>1 sendok teh bubuk jinten</li>
                        <li>1 sendok teh paprika</li>
                        <li>1 sendok teh garam</li>
                        <li>1/2 sendok teh merica hitam</li>
                        <li>2 sendok makan saus tomat</li>
                        <li>1/4 cangkir air atau kaldu</li>
                        <li>Keju parut (cheddar atau mozzarella)</li>
                        <li>Selada, iris tipis</li>
                        <li>Tomat, potong dadu</li>
                        <li>Wortel, serut kasar</li>
                        <li>Saus (salsa atau guacamole)</li>
                        <li>Krim asam (optional)</li>
                    </ul>
                </div>

                <div class="steps">
                    <h2>Cara Membuat:</h2>
                    <ol>
                        <li>Panaskan minyak sayur di atas wajan dengan api sedang. Tumis bawang bombay dan bawang putih hingga harum dan layu.</li>
                        <li>Masukkan daging giling, masak hingga daging berubah warna dan matang. Tambahkan bubuk cabai, jinten, paprika, garam, dan merica. Aduk rata.</li>
                        <li>Tuang saus tomat dan air (atau kaldu). Aduk rata dan masak hingga daging menyerap bumbu dan kuah sedikit mengental, sekitar 5-7 menit. Angkat.</li>
                        <li>Jika menggunakan kulit taco siap pakai, panaskan sebentar kulit taco di atas wajan tanpa minyak selama 1-2 menit untuk membuatnya lebih renyah dan mudah dilipat.</li>
                        <li>Ambil satu kulit taco, letakkan sedikit daging giling yang sudah dimasak di tengah. Tambahkan topping sesuai selera: keju parut, selada, tomat, wortel, dan saus pilihan seperti salsa atau guacamole. Tambahkan sedikit krim asam jika suka.</li>
                        <li>Lipat kulit taco dan sajikan segera! Taco bisa disajikan dengan lime wedges (irisan jeruk nipis) untuk memberi sentuhan asam segar.</li>
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
