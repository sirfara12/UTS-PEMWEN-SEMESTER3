function validateForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (!username || !password) {
        alert("Harus terisi");
        return false;
    }
    if (password.length < 5) {
        alert("Password minimal 5 karakter");
        return false;
    }
    if (!/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
        alert("Password harus terdiri dari huruf dan angka");
        return false;
    }
    return true;
}
$(document).ready(function() {
    let currentSlide = 0;
    const slides = $('.banner img');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.hide(); // Sembunyikan semua gambar
        slides.eq(index).fadeIn(); // Tampilkan gambar berdasarkan indeks
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides; // Pindah ke slide berikutnya
        showSlide(currentSlide);
    }

    setInterval(nextSlide, 3000); // Ganti gambar setiap 3 detik
});

