<?php
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir; 
    return $umur; 
}

function perkenalan($nama, $salam = "Assalamualaikum") {
    echo $salam . ", "; 
    echo "Perkenalkan, nama saya " . $nama . "<br/>"; 
}

echo "Saya berusia " . hitungUmur(2003, 2023) . " tahun<br/>"; // Ganti 1988 dengan tahun lahir kalian
echo "Senang berkenalan dengan Anda<br/>"; 
perkenalan("Elok");
?>
