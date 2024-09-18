<?php

$a = 10;       // Memberikan nilai 10 ke variabel $a
$b = 5;        // Memberikan nilai 5 ke variabel $b
$c = $a + 5;   // Menambah $a dengan 5 dan menyimpannya di variabel $c
$d = $b + (10 * 5); // Mengalikan 10 dengan 5, kemudian menambah hasilnya ke $b dan menyimpannya di variabel $d
$e = $d - $c;  // Mengurangi $c dari $d dan menyimpannya di variabel $e

// Menampilkan hasil dari masing-masing variabel
echo "<h3>Operasi Aritmatika:</h3>";
echo "Variabel a: {$a} <br>";
echo "Variabel b: {$b} <br>";
echo "Variabel c: {$c} <br>";
echo "Variabel d: {$d} <br>";
echo "Variabel e: {$e} <br>";
echo "<br>"; // Memberikan jarak antar bagian

// Menampilkan tipe data dan nilai dari variabel $e
echo "<h3>Tipe Data Variabel \$e:</h3>";
var_dump($e);
echo "<br><br>"; // Memberikan jarak antar bagian

// Nilai mata pelajaran
$nilaiMatematika = 5.1;
$nilaiIPA = 6.7;
$nilaiBahasaIndonesia = 9.3;

// Menghitung rata-rata nilai
$rataRata = ($nilaiMatematika + $nilaiIPA + $nilaiBahasaIndonesia) / 3;

// Menampilkan nilai setiap mata pelajaran dan rata-rata
echo "<h3>Nilai Mata Pelajaran:</h3>";
echo "Matematika: {$nilaiMatematika} <br>";
echo "IPA: {$nilaiIPA} <br>";
echo "Bahasa Indonesia: {$nilaiBahasaIndonesia} <br>";
echo "Rata-rata: {$rataRata} <br>";
echo "<br>"; // Memberikan jarak antar bagian

// Menampilkan tipe data dan nilai dari variabel $rataRata
echo "<h3>Tipe Data Variabel \$rataRata:</h3>";
var_dump($rataRata);
echo "<br><br>"; // Memberikan jarak antar bagian

// Nilai boolean
$apakahSiswaLulus = true;
$apakahSiswaSudahUjian = false;

echo "<h3>Status Siswa:</h3>";
var_dump($apakahSiswaLulus);
echo "<br>";
var_dump($apakahSiswaSudahUjian);
echo "<br><br>"; // Memberikan jarak antar bagian

// Nama lengkap
$namaDepan = "Ibnu";
$namaBelakang = 'Jakaria';

$namaLengkap = "{$namaDepan} {$namaBelakang}";
$namaLengkap2 = $namaDepan . ' ' . $namaBelakang;

echo "<h3>Nama Lengkap:</h3>";
echo "Nama Depan: {$namaDepan} <br>";
echo 'Nama Belakang: ' . $namaBelakang . '<br>';
echo "Nama Lengkap: {$namaLengkap} <br>";
echo "<br>"; // Memberikan jarak antar bagian

// List mahasiswa
$listMahasiswa = ["Wahid Abdullah", "Elmo Bachtiar", "Lendis Fabri"];
echo "<h3>List Mahasiswa:</h3>";
echo $listMahasiswa[0];
?>
