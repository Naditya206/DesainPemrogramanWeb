<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilaiSiswa);

$nilaiTerpilih = array_slice($nilaiSiswa, 2, -2);

$totalNilai = array_sum($nilaiTerpilih);

$rataRata = $totalNilai / count($nilaiTerpilih);

echo "Nilai yang digunakan (setelah mengabaikan dua nilai tertinggi dan dua nilai terendah): " . implode(', ', $nilaiTerpilih) . "<br>";
echo "Total nilai yang digunakan: $totalNilai<br>";
echo "Rata-rata nilai: " . number_format($rataRata, 2) . "<br>";
?>
