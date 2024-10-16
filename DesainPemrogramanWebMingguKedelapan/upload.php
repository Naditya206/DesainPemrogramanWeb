<?php
if (isset($_POST["submit"])) {
    $targetdir = "uploads/"; // Direktori tujuan untuk menyimpan file
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
    $allowedExtensions = array("txt", "pdf", "doc", "docx"); // Ekstensi yang diizinkan
    $maxsize = 3 * 1024 * 1024; // Ukuran maksimum file 3MB

    // Cek apakah ekstensi file diizinkan dan ukurannya tidak melebihi batas
    if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"] <= $maxsize) {
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
            echo "File berhasil diunggah.";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
    }
}
?>
