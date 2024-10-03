<?php
$pesan = "saya arek malang";

// Ubah variabel $pesan menjadi array dengan perintah explode
$pesanPerkata = explode(" ", $pesan); // Memisahkan string berdasarkan spasi

// Ubah setiap kata dalam array menjadi kebalikannya
$pesanPerkata = array_map(fn($kata) => strrev($kata), $pesanPerkata);

// Gabungkan kembali array menjadi string
$pesan = implode(" ", $pesanPerkata); // Menggabungkan kembali dengan spasi

echo $pesan . "<br>"; // Menampilkan hasil akhir
?>
