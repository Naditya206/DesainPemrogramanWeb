<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa Sekolah</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@400;700&display=swap">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <ul>
                <li><a href="data siswa/index.php">Data Siswa</a></li>
                <li><a href="nilai siswa/index.php">Nilai Siswa</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Main Content -->
    <section id="main-content">
        <div id="dashboard">
            <h2>Selamat datang, <?php echo htmlspecialchars($username); ?></h2>
            <div class="notifications">
                <h3>Pengumuman Terbaru</h3>
                <p>Jadwal Ujian Akhir Semester: 15-20 Desember 2024</p>
                <p id="current-time"></p> 
            </div>
            <br>
            <h2>Menu</h2>
            <div class="catalog">
                <a href="data siswa/index.php">
                    <div class="catalog-item fade-in">
                        <img src="./asset/siswa.jpg" alt="Tambah Data Siswa">
                        <div class="catalog-text">Data Siswa</div>
                    </div>
                </a>
                <a href="nilai siswa/index.php">
                    <div class="catalog-item fade-in">
                        <img src="./asset/rapot.jpeg" alt="Koperasi Siswa">
                        <div class="catalog-text">Nilai Siswa</div>
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
