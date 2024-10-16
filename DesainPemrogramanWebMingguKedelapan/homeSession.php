<!DOCTYPE html>
<html>
<head>
    <title>Halaman Home</title>
</head>
<body>
<?php
session_start(); // Memulai sesi

if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
    // Jika pengguna sudah login
    echo "Selamat datang " . $_SESSION['username'] . "<br>";
    echo '<a href="sessionLogout.php">Logout</a>';
} else {
    // Jika pengguna belum login
    echo "Anda belum login, silahkan ";
    echo '<a href="sessionLoginForm.html">Login</a>';
}
?>
</body>
</html>
