<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Harga Kamar</title>
</head>
<body>
    <h1>Cek Harga Kamar</h1>
    <form method="POST" action="">
        <label for="harga">Harga per malam:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="malam">Jumlah malam:</label>
        <input type="number" id="malam" name="malam" required>

        <button type="submit">Hitung</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $harga = $_POST['harga'];
        $malam = $_POST['malam'];
        $total = $harga * $malam;

        echo "<p>Total Biaya: Rp $total</p>";
    }
    ?>
</body>
</html>
