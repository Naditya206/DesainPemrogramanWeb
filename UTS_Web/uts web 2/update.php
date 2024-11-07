<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];

    $query = "UPDATE Siswa SET nama = ?, alamat = ?, umur = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nama, $alamat, $umur, $id]);

    header("Location: index.php");
    exit();
}
?>
