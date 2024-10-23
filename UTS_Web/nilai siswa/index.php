<?php
session_start();

// Inisialisasi data siswa jika belum ada
if (!isset($_SESSION['siswa'])) {
    $_SESSION['siswa'] = [];
}

// Tambah data siswa
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_absen = $_POST['no_absen'];
    $kelas = $_POST['kelas'];
    $nilai = $_POST['nilai'];

    // Tambah data ke array session
    $_SESSION['siswa'][] = [
        'nama' => $nama,
        'no_absen' => $no_absen,
        'kelas' => $kelas,
        'nilai' => $nilai
    ];
}

// Hapus data siswa
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($_SESSION['siswa'][$index]);
    $_SESSION['siswa'] = array_values($_SESSION['siswa']); // Reset index array
}

// Edit data siswa
if (isset($_POST['update'])) {
    $index = $_POST['index'];
    $nama = $_POST['nama'];
    $no_absen = $_POST['no_absen'];
    $kelas = $_POST['kelas'];
    $nilai = $_POST['nilai'];

    // Update data di array session
    $_SESSION['siswa'][$index] = [
        'nama' => $nama,
        'no_absen' => $no_absen,
        'kelas' => $kelas,
        'nilai' => $nilai
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Daftar Nilai Siswa</h2>

    <!-- Form tambah/edit data siswa -->
    <form method="POST" action="" class="form">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        
        <div class="form-group">
            <label for="no_absen">No Absen:</label>
            <input type="number" id="no_absen" name="no_absen" required>
        </div>
        
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select id="kelas" name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="TKJ 1">TKJ 1</option>
                <option value="TKJ 2">TKJ 2</option>
                <option value="TKJ 3">TKJ 3</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai:</label>
            <input type="number" id="nilai" name="nilai" required>
        </div>

        <div class="form-actions">
            <!-- Untuk edit data -->
            <?php if (isset($_GET['edit'])): ?>
                <input type="hidden" name="index" value="<?= $_GET['edit'] ?>">
                <button type="submit" name="update" class="btn edit">Update Data</button>
            <?php else: ?>
                <button type="submit" name="submit" class="btn">Tambah Data</button>
            <?php endif; ?>
        </div>
    </form>

    <!-- Tabel data siswa -->
    <table class="styled-table">
        <thead>
            <tr>
                <th>No Absen</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['siswa'] as $index => $siswa): ?>
                <tr>
                    <td><?= htmlspecialchars($siswa['no_absen']) ?></td>
                    <td><?= htmlspecialchars($siswa['nama']) ?></td>
                    <td><?= htmlspecialchars($siswa['kelas']) ?></td>
                    <td><?= htmlspecialchars($siswa['nilai']) ?></td>
                    <td>
                        <a href="?edit=<?= $index ?>" class="btn edit">Edit</a>
                        <a href="?delete=<?= $index ?>" class="btn delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
