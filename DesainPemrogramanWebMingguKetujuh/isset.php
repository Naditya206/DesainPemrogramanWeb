<?php
$umur;

if (isset($umur)) {
    if ($umur >= 18) {
        echo "Anda sudah dewasa.";
    } else {
        echo "Anda belum dewasa.";
    }
} else {
    echo "Variabel 'umur' tidak ditemukan.";
}


echo "<br>";

$data = array("nama" => "Jane", "usia" => 25);

if (isset($data["nama"])) {
    echo "Nama: " . $data["nama"]; 
} else {
    echo "Variabel 'nama' tidak ditemukan dalam array.";
}
?>
