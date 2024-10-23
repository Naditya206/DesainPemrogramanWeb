<?php
session_start();

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo']) && isset($_FILES['document'])) {
        $name = $_POST['name'];
        $class = $_POST['class'];
        $school = $_POST['school'];

        
        $photoPath = 'uploads/' . basename($_FILES['photo']['name']);
        $photoUploadSuccess = move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);

        
        $documentPath = 'uploads/' . basename($_FILES['document']['name']);
        $documentUploadSuccess = move_uploaded_file($_FILES['document']['tmp_name'], $documentPath);

        if ($photoUploadSuccess && $documentUploadSuccess) {
            
            $_SESSION['students'][] = [
                'name' => $name,
                'class' => $class,
                'school' => $school,
                'photo' => $photoPath,
                'document' => $documentPath,
                'score' => null 
            ];
            echo json_encode($_SESSION['students']);
        } else {
            echo json_encode(['error' => 'Gagal meng-upload file.']);
        }
        exit;
    } else {
        echo json_encode(['error' => 'File tidak ditemukan.']);
    }
}


if (isset($_POST['submit_scores'])) {
    $validScores = true; 

    foreach ($_POST['scores'] as $index => $score) {
        if (isset($_SESSION['students'][$index])) {
            
            if (empty($score) || !is_numeric($score)) {
                $validScores = false; 
                continue; 
            }
            $_SESSION['students'][$index]['score'] = floatval($score); 
        }
    }

    if (!$validScores) {
        
        $_SESSION['error_message'] = "Semua nilai harus diisi dan berupa angka.";
    }

    header('Location: ' . $_SERVER['PHP_SELF']); 
    exit;
}


$averageScore = 0;
if (!empty($_SESSION['students'])) {
    $totalScore = 0;
    $count = 0;

    foreach ($_SESSION['students'] as $student) {
        if (isset($student['score']) && $student['score'] !== null) {
            $totalScore += $student['score'];
            $count++;
        }
    }
    $averageScore = $count > 0 ? $totalScore / $count : 0; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Nilai Siswa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('input[type="number"]').on('keydown', function(e) {
                if ($.inArray(e.key, ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Enter']) !== -1 ||
                    (e.key >= '0' && e.key <= '9') ||
                    (e.key === '.' && $(this).val().indexOf('.') === -1)) {
                    return; // Izinkan
                }
                e.preventDefault(); 
            });

            
            $('#averageScoreButton').on('click', function() {
                let total = 0;
                let count = 0;
                $('input[name^="scores"]').each(function() {
                    let value = parseFloat($(this).val());
                    if (!isNaN(value)) {
                        total += value;
                        count++;
                    }
                });
                let average = count > 0 ? (total / count).toFixed(2) : 0; 
                $('#averageScoreDisplay').text('Rata-rata Nilai: ' + average); 
            });
        });
    </script>
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><a href="../index.php">Kembali</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Form Input Nilai Siswa</h2>
        <?php
        
        if (isset($_SESSION['error_message'])) {
            echo "<div style='color: red;'>{$_SESSION['error_message']}</div>";
            unset($_SESSION['error_message']); 
        }
        ?>
        <form method="POST" action="">
            <table id="studentTable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($_SESSION['students'] as $index => $student) {
                    $scoreValue = $student['score'] ?? ''; 
                    echo "<tr>
                        <td>{$student['name']}</td>
                        <td>{$student['class']}</td>
                        <td>
                            <input type='number' name='scores[{$index}]' value='{$scoreValue}' placeholder='Masukkan Nilai' required>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
            <button type="submit" name="submit_scores">Simpan Semua Nilai</button>
            <div id="averageScoreDisplay" style="margin-top: 10px; font-weight: bold;">Rata-rata Nilai: <?php echo number_format($averageScore, 2); ?></div>
        </form>
    </div>
</body>
</html>
