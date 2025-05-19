<?php
include 'koneksi.php'; // File koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi input
    if ($password !== $confirm_password) {
        $error = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Cek apakah username sudah terdaftar
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username sudah digunakan, pilih username lain!";
        } else {
            // Simpan data ke database
            $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                $success = "Registrasi berhasil! Silakan login.";
                header("Location: login.php");
                exit();
            } else {
                $error = "Terjadi kesalahan saat registrasi. Coba lagi.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .register-container input {
            width: 90%;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
        }

        .register-container button {
            width: 95%;
            padding: 10px;
            margin: 20px auto;
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .register-container button:hover {
            background: #45a049;
        }

        .error, .success {
            text-align: center;
            margin-bottom: 10px;
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
            <button type="submit">Daftar</button>
        </form>
    </div>
</body>
</html>