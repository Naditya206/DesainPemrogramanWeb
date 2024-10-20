<?php
session_start();

// Array untuk menyimpan data siswa
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

// Proses upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo']) && isset($_FILES['document'])) {
        $name = $_POST['name'];
        $class = $_POST['class'];
        $school = $_POST['school'];

        // Menangani upload foto
        $photoPath = 'uploads/' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);

        // Menangani upload dokumen
        $documentPath = 'uploads/' . basename($_FILES['document']['name']);
        move_uploaded_file($_FILES['document']['tmp_name'], $documentPath);

        // Menyimpan data siswa ke dalam session
        $_SESSION['students'][] = [
            'name' => $name,
            'class' => $class,
            'school' => $school,
            'photo' => $photoPath,
            'document' => $documentPath,
        ];
    }
    // Mengirim kembali data siswa sebagai JSON
    echo json_encode($_SESSION['students']);
    exit;
}

// Menghapus data siswa
if (isset($_GET['delete'])) {
    $index = intval($_GET['delete']);

    // Menghapus file yang terkait
    if (file_exists($_SESSION['students'][$index]['photo'])) {
        unlink($_SESSION['students'][$index]['photo']); // Hapus foto
    }
    if (file_exists($_SESSION['students'][$index]['document'])) {
        unlink($_SESSION['students'][$index]['document']); // Hapus dokumen
    }

    // Hapus data dari session
    unset($_SESSION['students'][$index]);
    $_SESSION['students'] = array_values($_SESSION['students']); // Reindex array
    echo json_encode($_SESSION['students']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Upload Data Siswa</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="container">
        <header>Form Upload Data Siswa</header>
        <form id="studentForm" enctype="multipart/form-data">
            <div class="input-field">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" placeholder="Masukkan Nama" required>
            </div>
            <div class="input-field">
                <label for="class">Kelas</label>
                <input type="text" name="class" id="class" placeholder="Masukkan Kelas" required>
            </div>
            <div class="input-field">
                <label for="school">Sekolah</label>
                <input type="text" name="school" id="school" placeholder="Masukkan Sekolah" required>
            </div>
            <div class="input-field">
                <label for="photo">Foto</label>
                <input type="file" name="photo" id="photo" accept="image/*" required>
            </div>
            <div class="input-field">
                <label for="document">Dokumen</label>
                <input type="file" name="document" id="document" accept=".pdf,.doc,.docx" required>
            </div>
            <button type="submit">Upload</button>
        </form>
        <table id="studentTable">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nama Sekolah</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Tampilkan data siswa yang sudah ada di sesi
            foreach ($_SESSION['students'] as $index => $student) {
                $documentName = basename($student['document']); // Ambil nama dokumen
                echo "<tr>
                    <td><img src=\"{$student['photo']}\" alt=\"Foto\" width=\"50\"></td>
                    <td>{$student['name']}</td>
                    <td>{$student['class']}</td>
                    <td>{$student['school']}</td>
                    <td><a href=\"{$student['document']}\" target=\"_blank\">{$documentName}</a></td>
                    <td>
                        <button onclick=\"deleteStudent({$index})\">Hapus</button>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
