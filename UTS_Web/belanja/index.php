<?php
session_start();

// Inisialisasi keranjang jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Mengambil keranjang dari cookies jika ada
if (isset($_COOKIE['keranjang'])) {
    $_SESSION['keranjang'] = json_decode($_COOKIE['keranjang'], true);
}

// Daftar produk
$produk = [
    ['id' => 1, 'nama' => 'Produk A', 'harga' => 10000],
    ['id' => 2, 'nama' => 'Produk B', 'harga' => 15000],
    ['id' => 3, 'nama' => 'Produk C', 'harga' => 20000],
];

// Default pengaturan diskon
$minimalBelanja = 50000; // default
$diskonPersentase = 10; // default

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_produk'])) {
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];

        // Tambahkan produk ke keranjang
        $_SESSION['keranjang'][$id_produk] = isset($_SESSION['keranjang'][$id_produk]) ? $_SESSION['keranjang'][$id_produk] + $jumlah : $jumlah;

        // Simpan keranjang ke cookies
        setcookie('keranjang', json_encode($_SESSION['keranjang']), time() + (86400 * 30), "/"); // 30 hari
    } elseif (isset($_POST['minimal_belanja']) && isset($_POST['diskon'])) {
        // Update pengaturan diskon
        $minimalBelanja = intval($_POST['minimal_belanja']);
        $diskonPersentase = intval($_POST['diskon']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Belanja</title>
    <script>
        let minimalBelanja = <?php echo $minimalBelanja; ?>;
        let diskonPersentase = <?php echo $diskonPersentase; ?>;

        function updateTotal(id, price) {
            const quantity = document.getElementById('jumlah-' + id).value;
            const total = price * quantity;

            // Update total harga
            document.getElementById('total-' + id).innerText = total.toLocaleString('id-ID');

            // Hitung total belanja
            let grandTotal = 0;
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                const totalCell = row.querySelector('span[id^="total-"]');
                if (totalCell) {
                    grandTotal += parseInt(totalCell.innerText.replace(/\./g, ''), 10);
                }
            });

            // Tampilkan total dan diskon
            document.getElementById('grand-total').innerText = grandTotal.toLocaleString('id-ID');
            if (grandTotal >= minimalBelanja) {
                const diskon = grandTotal * (diskonPersentase / 100);
                document.getElementById('diskon').innerText = diskon.toLocaleString('id-ID');
                document.getElementById('total-setelah-diskon').innerText = (grandTotal - diskon).toLocaleString('id-ID');
            } else {
                document.getElementById('diskon').innerText = "0";
                document.getElementById('total-setelah-diskon').innerText = grandTotal.toLocaleString('id-ID');
            }
        }

        function updateDiscountSettings() {
            minimalBelanja = parseInt(document.getElementById('minimal_belanja').value);
            diskonPersentase = parseInt(document.getElementById('diskon').value);
            updateTotal(1, 10000); // Memicu update untuk produk pertama agar menghitung ulang total
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Form Belanja</h1>
        
        <h2>Pilih Produk</h2>
        <form method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produk as $item): ?>
                        <tr>
                            <td><?php echo $item['nama']; ?></td>
                            <td><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                            <td>
                                <input type="number" id="jumlah-<?php echo $item['id']; ?>" name="jumlah" min="0" value="0" required onchange="updateTotal(<?php echo $item['id']; ?>, <?php echo $item['harga']; ?>)">
                                <input type="hidden" name="id_produk" value="<?php echo $item['id']; ?>">
                            </td>
                            <td>
                                <span id="total-<?php echo $item['id']; ?>">0</span> <!-- default untuk produk -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit">Tambah ke Keranjang</button>
        </form>

        <h2>Pengaturan Diskon</h2>
        <form method="POST" onsubmit="updateDiscountSettings(); return false;">
            <label for="minimal_belanja">Minimal Belanja (Rp):</label>
            <input type="number" id="minimal_belanja" name="minimal_belanja" value="<?php echo $minimalBelanja; ?>" required>
            <label for="diskon">Diskon (%):</label>
            <input type="number" id="diskon" name="diskon" value="<?php echo $diskonPersentase; ?>" required>
            <button type="submit">Update Diskon</button>
        </form>
        
        <h2>Detail Belanja</h2>
        <p>Total Belanja: <span id="grand-total">0</span></p>
        <p>Diskon: <span id="diskon">0</span></p>
        <p>Total Setelah Diskon: <span id="total-setelah-diskon">0</span></p>
    </div>
</body>
</html>
