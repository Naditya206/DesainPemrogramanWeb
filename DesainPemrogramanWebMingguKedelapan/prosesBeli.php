<?php
if (isset($_POST["beliNovel"]) && isset($_POST["beliBuku"])) {
    setcookie("beliNovel", $_POST["beliNovel"], time() + 3600); // Cookie berlaku selama 1 jam
    setcookie("beliBuku", $_POST["beliBuku"], time() + 3600); // Cookie berlaku selama 1 jam
    header("location: keranjangBelanja.php");
    exit(); // Menambahkan exit untuk menghentikan eksekusi skrip
}
?>
