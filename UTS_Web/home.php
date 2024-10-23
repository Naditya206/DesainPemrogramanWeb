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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            </div>
            <br>
            <h2>Menu</h2>
            <div class="catalog">
                <a href="data siswa/index.php">
                    <div class="catalog-item fade-in">
                        <img src="./asset/12.jpg" alt="Tambah Data Siswa">
                        <div class="catalog-text">Data Siswa</div>
                    </div>
                </a>
                <a href="nilai siswa/index.php">
                    <div class="catalog-item fade-in">
                        <img src="./asset/13.jpg" alt="Koperasi Siswa">
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

    <script>
    $(document).ready(function () {
        // Menambahkan kelas 'visible' untuk memicu animasi saat halaman dimuat
        $('.fade-in').each(function (index) {
            $(this).delay(300 * index).queue(function (next) {
                $(this).addClass('visible');
                next();
            });
        });

        // Efek hover tambahan pada item katalog
        $('.catalog-item').hover(
            function () {
                $(this).stop().animate({ opacity: 0.8 }, 300);
            },
            function () {
                $(this).stop().animate({ opacity: 1 }, 300);
            }
        );
    });
</script>

    
</body>
</html>
