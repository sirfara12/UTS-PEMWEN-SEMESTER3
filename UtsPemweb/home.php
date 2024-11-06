<?php
session_start();

// Redirect ke halaman login jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: cekHarga.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Home - Arsaf Hotel</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Arsaf Hotel</h1>
            <nav>
                <a href="home.php">Home</a>
                <a href="cekHarga.php">Cek Harga</a>
                <a href="index.php?logout=true">Logout</a>
            </nav>
        </div>
    </header>


    <div class="container">
        <!-- Banner Slider -->
        <div class="banner">
            <div class="slide">
                <img src="hotel.jpeg" alt="Banner 1">
                <img src="hotel2.jpeg" alt="Banner 2">
                <img src="hotel3.jpeg" alt="Banner 3">
            </div>
        </div>

        <!-- Profil Hotel -->
        <div class="hotel-profile">
            <h2>Profil Hotel</h2>
            <p>
            Arsaf Hotel yang berlokasi di Malang merupakan hotel bintang 4 yang unik 
            menonjolkan budaya dan desain tradisional yang elegan, 
            dilengkapi dengan fasilitas teknologi yang modern. <br>
            Berlokasi strategis di jalan utama kota Malang dekat 
            dengan kawasan pemerintahan dan berbagai destinasi wisata. 
            Hotel ini menawarkan perpaduan nuansa elegan tradisional dan 
            modern yang  sempurna untuk bisnis dan liburan. 
            <br><br><br>
            <b><ul>Vasilitas</ul></b>
               <li>Restaurant</li>
               <li>Coffe shop</li>
               <li>Room Service</li>
               <li>Swimming Pool</li>
               <li>Spa</li>
            </p>
        </div>
    </div>

    <footer>
        <p>Hubungi Admin @083841750041</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
