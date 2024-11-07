<?php
$serverName = "localhost";
$database = "SimpleCRUD";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
