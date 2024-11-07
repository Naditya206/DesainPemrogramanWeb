<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sederhana dengan PHP dan SQL Server</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Data Siswa</h2>
        <form action="simpan.php" method="post" class="mb-4">
            <div class="form-group">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="form-group">
                <input type="number" name="umur" class="form-control" placeholder="Umur" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <h2 class="mb-4">Data Siswa</h2>
        <form action="hapus.php" method="post"> 
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Pilih</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM Siswa";
                    $stmt = $conn->query($query);
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                            <td><input type='checkbox' name='ids[]' value='{$row['id']}'></td>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['alamat']}</td>
                            <td>{$row['umur']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger">Hapus Data Terpilih</button> 
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
