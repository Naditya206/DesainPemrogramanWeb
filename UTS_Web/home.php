<?php
session_start(); // Mulai sesi

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum, arahkan ke halaman login
    exit();
}

$username = $_SESSION['username']; // Ambil nama pengguna dari sesi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa Sekolah</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@400;700&display=swap">
</head>
<body>

    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="form/index.php">Data Siswa</a></li>
                <li><a href="belanja/index.php">Koperasi Siswa</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <section id="main-content">
            <!-- Dashboard Content -->
            <div id="dashboard">
                <h2>Selamat datang, <?php echo htmlspecialchars($username); ?></h2>
                <div class="notifications">
                    <h3>Pengumuman Terbaru</h3>
                    <p>Jadwal Ujian Akhir Semester: 15-20 Desember 2024</p>
                </div>
                <br>
                <h2>Menu</h2>
                <div class="catalog">
                    <a href="form/index.php">
                        <div class="catalog-item">
                            <img src="./asset/12.jpg" alt="Tambah Data Siswa">
                            <div class="catalog-text">Tambah Data Siswa</div>
                        </div>
                    </a>
                    <a href="belanja/index.php">
                        <div class="catalog-item">
                            <img src="./asset/13.jpg" alt="Koperasi Siswa">
                            <div class="catalog-text">Koperasi Siswa</div>
                        </div>
                    </a>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Naditya</p>
    </footer>
    
</body>
</html>
