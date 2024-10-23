<?php
session_start();

if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo']) && isset($_FILES['document'])) {
        $name = $_POST['name'] ?? '';
        $class = $_POST['class'] ?? '';
        $school = $_POST['school'] ?? '';

        $photoPath = 'uploads/' . basename($_FILES['photo']['name']);
        $documentPath = 'uploads/' . basename($_FILES['document']['name']);
        
       
        $photoUploadSuccess = move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
        
        $documentUploadSuccess = move_uploaded_file($_FILES['document']['tmp_name'], $documentPath);

        if ($photoUploadSuccess && $documentUploadSuccess) {
            $_SESSION['students'][] = [
                'name' => $name,
                'class' => $class,
                'school' => $school,
                'photo' => $photoPath,
                'document' => $documentPath,
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

if (isset($_GET['delete'])) {
    $index = intval($_GET['delete']);

    if (isset($_SESSION['students'][$index])) {
        if (file_exists($_SESSION['students'][$index]['photo'])) {
            unlink($_SESSION['students'][$index]['photo']); 
        }
        if (file_exists($_SESSION['students'][$index]['document'])) {
            unlink($_SESSION['students'][$index]['document']); 
        }

        unset($_SESSION['students'][$index]);
        $_SESSION['students'] = array_values($_SESSION['students']); 
        echo json_encode($_SESSION['students']);
    } else {
        echo json_encode(['error' => 'Data tidak ditemukan.']);
    }
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
    <script src="script.js"></script>
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
        <h2>Form Upload Data Siswa</h2>
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
                    <th>Sekolah</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_SESSION['students'] as $index => $student) {
                $documentName = basename($student['document']); 
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
    <script>
        document.getElementById('studentForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            
            var formData = new FormData(this);

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('studentTable').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = ''; 

                data.forEach((student, index) => {
                    const row = tableBody.insertRow();
                    row.innerHTML = `
                        <td><img src="${student.photo}" alt="Foto" width="50"></td>
                        <td>${student.name}</td>
                        <td>${student.class}</td>
                        <td>${student.school}</td>
                        <td><a href="${student.document}" target="_blank">${student.document.split('/').pop()}</a></td>
                        <td><button onclick="deleteStudent(${index})">Hapus</button></td>
                    `;
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        function deleteStudent(index) {
            fetch(`?delete=${index}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('studentTable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = ''; 

                    data.forEach((student, index) => {
                        const row = tableBody.insertRow();
                        row.innerHTML = `
                            <td><img src="${student.photo}" alt="Foto" width="50"></td>
                            <td>${student.name}</td>
                            <td>${student.class}</td>
                            <td>${student.school}</td>
                            <td><a href="${student.document}" target="_blank">${student.document.split('/').pop()}</a></td>
                            <td><button onclick="deleteStudent(${index})">Hapus</button></td>
                        `;
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</body>
</html>
