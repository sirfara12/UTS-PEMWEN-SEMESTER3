<?php
session_start();

// Proses Login
$loginError = ''; // Inisialisasi variabel pesan kesalahan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi server-side
    if (empty($username) || empty($password)) {
        $loginError = "Harus terisi";
    } elseif (strlen($password) < 5) {
        $loginError = "Password minimal 5 karakter";
    } elseif (!preg_match("/\d/", $password) || !preg_match("/[a-zA-Z]/", $password)) {
        $loginError = "Password harus terdiri dari huruf dan angka";
    } else {
        // Simpan username ke dalam session
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Arsaf Hotel</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Arsaf Hotel</h1>
    </header>
    <div class="login-container">
        <div class="login-box">
            <p>Mohon login terlebih dahulu</p>
            <?php if (!empty($loginError)) echo "<p class='error' style='color:red;'>$loginError</p>"; ?> <!-- Menampilkan pesan kesalahan di sini -->
            <form method="post" onsubmit="return validateForm()">
                <label for="username">username</label>
                <input type="text" id="username" name="username">
                
                <label for="password">password</label>
                <input type="password" id="password" name="password">
                
                <button type="submit" name="login">LOGIN</button>
            </form>
        </div>
    </div>
</body>
</html>
