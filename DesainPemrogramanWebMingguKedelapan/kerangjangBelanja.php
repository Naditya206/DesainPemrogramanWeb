<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
</head>
<body>
    <h2>Keranjang Belanja</h2>
    <?php
    $beliNovel = isset($_COOKIE['beliNovel']) ? $_COOKIE['beliNovel'] : 0; // Mengambil jumlah novel dari cookie
    $beliBuku = isset($_COOKIE['beliBuku']) ? $_COOKIE['beliBuku'] : 0; // Mengambil jumlah buku dari cookie

    echo "Jumlah Novel: " . htmlspecialchars($beliNovel) . "<br>";
    echo "Jumlah Buku: " . htmlspecialchars($beliBuku);
    ?>
</body>
</html>
