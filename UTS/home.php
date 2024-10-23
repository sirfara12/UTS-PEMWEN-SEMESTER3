<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Proses Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ABC Hotel</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
    <div class="header-content">
        <h1>ABC Hotel</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="?page=cek_harga">Cek Harga</a>
            <a href="home.php?logout=true">Logout</a>
        </nav>
    </div>
</header>

<div class="main-content">
    <?php if (isset($_GET['page']) && $_GET['page'] === 'cek_harga'): ?>
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
            <div id="hasil"></div>
        </div>
    <?php else: ?>
        <!-- Halaman Home -->
        <div class="content">
            <h2>Hotel Profile</h2>
            <p>Selamat datang di ABC Hotel, tempat penginapan nyaman dan berkualitas.</p>
        </div>
    <?php endif; ?>
</div>

<footer>
    <p>Website Footer</p>
</footer>

<script src="script.js"></script>
</body>
</html>
