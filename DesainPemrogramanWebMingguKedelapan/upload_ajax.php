<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $max_file_size = 2 * 1024 * 1024; // Maksimum 2 MB
    $upload_directory = "uploads/"; // Direktori penyimpanan file

    // Periksa apakah direktori penyimpanan ada, jika tidak maka buat
    if (!file_exists($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }

    $totalFiles = count($_FILES['files']['name']);
    
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        if (!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "Ekstensi file $file_name tidak diizinkan. Harus jpg, jpeg, png, atau gif.";
            continue; // Lewati file ini
        }

        // Validasi ukuran file
        if ($file_size > $max_file_size) {
            $errors[] = "Ukuran file $file_name tidak boleh lebih dari 2 MB.";
            continue; // Lewati file ini
        }

        // Pindahkan file yang valid ke direktori penyimpanan
        if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
            echo "File $file_name berhasil diunggah.<br>";
        } else {
            echo "Gagal mengunggah file $file_name.<br>";
        }
    }

    // Tampilkan semua kesalahan
    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
