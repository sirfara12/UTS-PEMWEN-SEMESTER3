<?php
session_start();

// Proses Logout
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_destroy();  // Menghancurkan semua data sesi
    header("Location: index.php");  // Redirect ke halaman login setelah logout
    exit();
}

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
    <title>Arsaf Hotel</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
    <div class="header-content">
        <h1>Arsaf Hotel</h1>
        <?php if ($loggedIn): ?>
            <nav>
                <a href="index.php">Home</a>
                <a href="?page=cek_harga">Cek Harga</a>
                <a href="index.php?logout=true">Logout</a>  <!-- Logout URL -->
            </nav>
        <?php endif; ?>
    </div>
</header>

<div class="main-content">
    <?php if (!$loggedIn): ?>
        <!-- Halaman Login -->
        <div class="login-container">
            <h2>Mohon login terlebih dahulu</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
            <form method="POST">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="login">LOGIN</button>
            </form>
        </div>
    <?php elseif (isset($_GET['page']) && $_GET['page'] === 'cek_harga'): ?>
        <!-- Halaman Cek Harga -->
        <div class="cek-harga-container">
            <h2>Cek Harga</h2>
            <form id="cekHargaForm">
                <label for="lantai">Lantai:</label>
                <input type="number" id="lantai" name="lantai" min="1" value="1">

                <label for="type">Type:</label>
                <select id="type" name="type">
                    <option value="300000">Standard - Rp 300.000</option>
                    <option value="400000">Superior - Rp 400.000</option>
                    <option value="500000">Deluxe - Rp 500.000</option>
                </select>

                <label for="jumlahHari">Jumlah Hari:</label>
                <input type="number" id="jumlahHari" name="jumlahHari" min="1" value="1">

                <label for="diskon">Diskon:</label>
                <select id="diskon" name="diskon">
                    <option value="none">Tidak Ada</option>
                    <option value="member">Member - 10%</option>
                    <option value="hut">Promo HUT - Rp 100.000</option>
                </select>

                <button type="button" onclick="hitungHarga()">CHECK</button>
            </form>
            <div id="transaksi" style="display: none;">
                <p>Total Transaksi: <span id="totalTransaksi"></span></p>
                <p>Total Diskon: <span id="totalDiskon"></span></p>
                <p>Total yang Harus Dibayarkan: <span id="totalBayar"></span></p>
            </div>
        </div>
    <?php else: ?>
        <!-- Halaman Home -->
        <div class="content">
            <img src="hotel.jpeg" alt="Banner Hotel" class="banner"> <!-- Tambahkan banner image -->
            <h2>Arsaf Hotel </h2>
            <p>Selamat datang di Arsaf Hotel, tempat penginapan nyaman dan berkualitas.</p>
            <p>Cari hotel plus kolam renang luas di Malang? 
               Mudah banget.Langsung saja kunjungi Arsaf Hotel Malang sekarang juga dan dapatkan diskon menarik untuk semua fasilitasnya."
            </p>
        </div>
    <?php endif; ?>
</div>

<?php if ($loggedIn): ?>
    <footer>
        <p>Hubungi Admin 083841765098</p>
    </footer>
<?php endif; ?>

<script src="script.js"></script>
</body>
</html>
