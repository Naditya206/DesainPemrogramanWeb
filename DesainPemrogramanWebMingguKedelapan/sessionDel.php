<?php
session_start(); // Memulai sesi

// Menghapus semua variabel sesi
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

echo "All session variables are now removed, and the session is destroyed."; // Pesan konfirmasi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Destroyed</title>
</head>
<body>
    <h2>Session Status</h2>
    <p>All session variables have been removed.</p>
</body>
</html>
