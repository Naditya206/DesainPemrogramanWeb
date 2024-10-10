<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .main {
            background-color: #d3d3d3;
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    $siswa = [
        [
            'nama' => 'Andi',
            'umur' => '15',
            'kelas' => '10A',
            'alamat' => 'Malang',
        ],
        [
            'nama' => 'Siti',
            'umur' => '16',
            'kelas' => '10B',
            'alamat' => 'Batu',
        ],
        [
            'nama' => 'Budi',
            'umur' => '15',
            'kelas' => '10A',
            'alamat' => 'Dinoyo',
        ],
        [
            'nama' => 'Anton',
            'umur' => '25',
            'kelas' => '15A',
            'alamat' => 'Dinoyo',
        ],
    ];

    $totalUmur = 0;
    $jumlahSiswa = count($siswa);

    foreach ($siswa as $data) {
        $totalUmur += $data['umur'];
    }
    $rataUmur = $totalUmur / $jumlahSiswa;
    ?>
    <h2>Data siswa</h2>
    <div class="main">
        <p style="text-align: center">Klik untuk melihat tabel siswa</p>

        <div id="tableContainer" style="display:none;">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                </tr>
                <?php foreach ($siswa as $data) : ?>
                <tr>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['umur']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <h2 style="text-align: center;">Rata-rata Umur Siswa: <?php echo number_format($rataUmur, 2)?></h2>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.main').click(function(){
                $('#tableContainer').slideToggle();
            });
        });
    </script>
</body>
</html>
