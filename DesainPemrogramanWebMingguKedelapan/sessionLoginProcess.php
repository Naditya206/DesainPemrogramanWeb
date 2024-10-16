<?php
session_start(); // Memulai sesi

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login
    if ($username == "admin" && $password == "1234") {
        $_SESSION["username"] = $username; // Menyimpan username ke dalam sesi
        $_SESSION["status"] = 'login'; // Menandai status login

        echo "Anda berhasil login. Silahkan menuju <a href='homeSession.php'>Halaman Home</a>";
    } else {
        echo "Gagal login. Silahkan login lagi <a href='login.html'>Halaman Login</a>";
    }
} else {
    echo "Mohon isi username dan password.";
}
?>
