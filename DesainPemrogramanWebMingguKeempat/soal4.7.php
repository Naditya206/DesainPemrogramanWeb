<?php
$hargaProduk = 120000;

$diskonPersen = 20;

if ($hargaProduk > 100000) {
    $diskon = ($diskonPersen / 100) * $hargaProduk;
    
    $hargaSetelahDiskon = $hargaProduk - $diskon;
} else {
    $hargaSetelahDiskon = $hargaProduk;
}

echo "Harga produk sebelum diskon: Rp " . number_format($hargaProduk, 0, ',', '.') . "<br>";
echo "Harga yang harus dibayar setelah diskon: Rp " . number_format($hargaSetelahDiskon, 0, ',', '.') . "<br>";
?>
