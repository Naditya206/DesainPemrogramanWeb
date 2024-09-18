<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil Penjumlahan ( $a + $b ) = $hasilTambah<br>";
echo "Hasil Pengurangan ( $a - $b ) = $hasilKurang<br>";
echo "Hasil Perkalian ( $a * $b ) = $hasilKali<br>";
echo "Hasil Pembagian ( $a / $b ) = $hasilBagi<br>";
echo "Hasil Sisa Bagi ( $a % $b ) = $sisaBagi<br>";
echo "Hasil Pangkat ( $a ** $b ) = $pangkat<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b; 
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil Sama ( $a == $b ) = " . ($hasilSama ? 'True' : 'False') . "<br>";
echo "Hasil Tidak Sama ( $a != $b ) = " . ($hasilTidakSama ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Kecil ( $a < $b ) = " . ($hasilLebihKecil ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Besar ( $a > $b ) = " . ($hasilLebihBesar ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Kecil Sama ( $a <= $b ) = " . ($hasilLebihKecilSama ? 'True' : 'False') . "<br>";
echo "Hasil Lebih Besar Sama ( $a >= $b ) = " . ($hasilLebihBesarSama ? 'True' : 'False') . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "Hasil AND ( $a && $b ) = " . ($hasilAnd ? 'True' : 'False') . "<br>";
echo "Hasil OR ( $a || $b ) = " . ($hasilOr ? 'True' : 'False') . "<br>";
echo "Hasil NOT A ( !$a ) = " . ($hasilNotA ? 'True' : 'False') . "<br>";
echo "Hasil NOT B ( !$b ) = " . ($hasilNotB ? 'True' : 'False') . "<br>";

$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

$a += $b; 
echo "Setelah a += $b: $a<br>";
$a -= $b;  
echo "Setelah a -= $b: $a<br>";
$a *= $b;  
echo "Setelah a *= $b: $a<br>";
$a /= $b;  
echo "Setelah a /= $b: $a<br>";
$a %= $b;  
echo "Setelah a %= $b: $a<br>";

$hasilIndentik = $a === $b;
$hasilTidakIndentik = $a !== $b;

echo "Hasil Identik ( $a === $b ) = " . ($hasilIndentik ? 'True' : 'False') . "<br>";
echo "Hasil Tidak Identik ( $a !== $b ) = " . ($hasilTidakIndentik ? 'True' : 'False') . "<br>";
?>
