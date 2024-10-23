function hitungHarga() {
    var lantai = document.getElementById("lantai").value;
    var type = document.getElementById("type").value;
    var jumlahHari = document.getElementById("jumlahHari").value;
    var diskon = document.getElementById("diskon").value;

    // Menghitung total transaksi (harga kamar * jumlah hari)
    var totalTransaksi = type * jumlahHari;

    // Menghitung diskon
    var totalDiskon = 0;
    if (diskon === "member") {
        totalDiskon = totalTransaksi * 0.10; // Diskon 10% untuk member
    } else if (diskon === "hut") {
        totalDiskon = 100000; // Diskon Rp 100.000 untuk promo HUT
    }

    // Menghitung total yang harus dibayarkan
    var totalBayar = totalTransaksi - totalDiskon;

    // Menampilkan hasil
    document.getElementById("totalTransaksi").innerHTML = "Rp " + totalTransaksi.toLocaleString();
    document.getElementById("totalDiskon").innerHTML = "Rp " + totalDiskon.toLocaleString();
    document.getElementById("totalBayar").innerHTML = "Rp " + totalBayar.toLocaleString();

    // Menampilkan bagian transaksi
    document.getElementById("transaksi").style.display = "block";
}
