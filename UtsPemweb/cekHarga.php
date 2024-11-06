<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: Index.php"); // Ganti dengan file login Anda
    exit();
}

$totalHarga = 0;
$diskon = 0;
$hargaAkhir = 0;
$pesanDiskon = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipeKamar = $_POST['tipe'];
    $lantai = $_POST['lantai'];
    $hari = $_POST['hari'];
    $jenisDiskon = $_POST['diskon'];

    // Harga berdasarkan tipe kamar
    $hargaPerHari = 0;
    if ($tipeKamar == "standard") {
        $hargaPerHari = 300000;
    } elseif ($tipeKamar == "superior") {
        $hargaPerHari = 400000;
    } elseif ($tipeKamar == "deluxe") {
        $hargaPerHari = 500000;
    }

    // Hitung harga awal
    $totalHarga = $hargaPerHari * $hari;

    // Tambahan biaya untuk lantai di atas 5
    if ($lantai > 5) {
        $totalHarga += 50000;
    }

    // Diskon berdasarkan jenis
    if ($jenisDiskon == "member") {
        $diskon = 0.10 * $totalHarga;
        $pesanDiskon = "Diskon Member (10%)";
    } elseif ($jenisDiskon == "ulang_tahun") {
        $diskon = 100000;
        $pesanDiskon = "Promo HUT (Rp 100,000)";
    }

    // Hitung total akhir
    $hargaAkhir = $totalHarga - $diskon;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Harga - Arsaf Hotel</title>
    <link rel="stylesheet" href="style.css">
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
        <h2>Cek Harga Kamar</h2>
        <form method="post">
            <br>
            <label for="tipe">Tipe Kamar:</label>
            <select id="tipe" name="tipe" required>
                <option value="standard">Standard - Rp 300,000</option>
                <option value="superior">Superior - Rp 400,000</option>
                <option value="deluxe">Deluxe - Rp 500,000</option>
            </select>
            
            <label for="lantai">Lantai Kamar:</label>
            <input type="number" id="lantai" name="lantai" min="1" required>
            
            <label for="hari">Jumlah Hari Menginap:</label>
            <input type="number" id="hari" name="hari" min="1" required>
            
            <label for="diskon">Pilih Diskon:</label>
            <select id="diskon" name="diskon">
                <option value="tidak_ada">Tidak Ada</option>
                <option value="member">Member (10%)</option>
                <option value="ulang_tahun">Promo HUT (Rp 100,000)</option>
            </select>
            <br><br>

            <button type="submit" name="cek">CHECK</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <div class="result">
                <h3>Hasil Perhitungan</h3>
                <p>Total Harga Sewa: Rp <?= number_format($totalHarga, 0, ',', '.') ?></p>
                <p><?= $pesanDiskon ?>: -Rp <?= number_format($diskon, 0, ',', '.') ?></p>
                <h4>Total yang Harus Dibayar: Rp <?= number_format($hargaAkhir, 0, ',', '.') ?></h4>
            </div>
        <?php endif; ?>
    </div>

    <footer>
        <p>Hubungi Admin @083841750041</p>
    </footer>
</body>
</html>
