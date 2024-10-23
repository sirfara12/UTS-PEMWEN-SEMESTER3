<?php
session_start();

// Proses Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Harus terisi";
    } elseif (strlen($password) < 5) {
        $error = "Password minimal 5 karakter";
    } elseif (!preg_match('/[0-9]/', $password)) {
        $error = "Password harus terdiri dari huruf dan angka";
    } else {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }
}

// Cek apakah user sudah login
$loggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ABC Hotel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-group {
            display: flex;
            align-items: center; /* Rata tengah secara vertikal */
            margin-bottom: 15px; /* Jarak antara form-group */
        }

        .form-group label {
            width: 100px; /* Atur lebar label */
            margin-right: 10px; /* Jarak antara label dan input */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login ke ABC Hotel</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" name="login">LOGIN</button>
        </form>
    </div>
</body>
</html>
