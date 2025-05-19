<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $bahan = $_POST['bahan'];
    $cara = $_POST['cara'];
    $gambar = $_FILES['gambar'];

    // Proses upload gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar["name"]);
    $upload_ok = true;

    if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
        // Simpan data ke database
        $sql = "INSERT INTO resep (judul, gambar, bahan, cara) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $judul, $target_file, $bahan, $cara);

        if ($stmt->execute()) {
            $success = "Resep berhasil diupload!";
            header("Location: resep.php");
        } else {
            $error = "Gagal menyimpan resep ke database.";
        }
    } else {
        $error = "Gagal mengupload gambar.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Resep</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('assets/food_background.jpg') no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; 
            background-attachment: fixed; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .upload-container {
    width: 400px;
    background: rgba(255, 255, 255, 0.4); /* Lebih transparan */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Bayangan lebih tajam */
    text-align: center;
    backdrop-filter: blur(10px); /* Efek blur tetap */
}


        .upload-container h2 {
            margin-bottom: 20px;
        }

        .upload-container input, .upload-container textarea {
            width: 90%;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
        }

        .upload-container button {
            width: 95%;
            padding: 10px;
            background:rgb(0, 0, 0);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .upload-container button:hover {
            background: #45a049;
        }

        .error, .success {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload Resep</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="judul" placeholder="Judul Resep" required>
            <textarea name="bahan" rows="5" placeholder="Bahan-bahan" required></textarea>
            <textarea name="cara" rows="5" placeholder="Cara Membuat" required></textarea>
            <input type="file" name="gambar" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>