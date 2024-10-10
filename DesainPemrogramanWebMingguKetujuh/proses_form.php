<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    
    // Menampilkan data yang dikirim
    echo "Nama: " . htmlspecialchars($nama) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
}
?>
