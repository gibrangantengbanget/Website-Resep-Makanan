<?php
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
    <title>Resep Makanan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="index.php" class="navbar-brand">
            <img src="assets/logo.png" alt="CookWith Logo" class="logo">
            <span class="website-name">CookWith</span>
        </div>
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
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <li><a href="logout.php" class="logout-btn">Logout</a></li>
        <?php endif; ?>
        </ul>
    </nav>
    
    <div class="card">
        <h1>Selamat Datang di Website Resep Makanan</h1>
        <p>Klik disini untuk melihat Resep yang tersdia di Website kami! 
            <a href="resep.php"><button class="btn">RESEP</button></a>.
        </p>
    </div>
    
    <style>
       
        .card {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    
    
        .btn {
            background: linear-gradient(45deg, #f53607, #961701);
            border: none;
            padding: 10px 20px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
    
      
        .btn:hover {
            background: linear-gradient(45deg, #feb47b, #ff7e5f);
            transform: scale(1.05);
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
    