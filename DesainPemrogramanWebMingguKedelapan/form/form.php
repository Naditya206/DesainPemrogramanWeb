<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Upload Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Upload Data Siswa</h1>

    <?php if (!empty($_GET['alertMessage'])): ?>
        <div class="alert alert-<?= htmlspecialchars($_GET['alertType']) ?>" role="alert">
            <?= htmlspecialchars($_GET['alertMessage']) ?>
        </div>
    <?php endif; ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="class" class="form-label">Kelas:</label>
            <input type="text" id="class" name="class" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Umur:</label>
            <input type="number" id="age" name="age" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="school" class="form-label">Sekolah:</label>
            <input type="text" id="school" name="school" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto (opsional):</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <h2 class="mb-4">List Data Siswa    </h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Umur</th>
                <th>Sekolah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $uploadedData = [];
            if (file_exists('uploads/data.txt')) {
                $lines = file('uploads/data.txt', FILE_IGNORE_NEW_LINES);
                foreach ($lines as $line) {
                    $data = explode('|', $line);
                    if (count($data) >= 4) {
                        $uploadedData[] = [
                            'image' => $data[4] ?? null,  
                            'name' => $data[0],
                            'class' => $data[1],
                            'age' => $data[2],
                            'school' => $data[3],
                        ];
                    }
                }
            }

            if (!empty($uploadedData)): ?>
                <?php foreach ($uploadedData as $data): ?>
                    <tr>
                        <td>
                            <?php if (!empty($data['image'])): ?>
                                <img src="uploads/<?= htmlspecialchars($data['image']) ?>" alt="Image" class="img-thumbnail" width="100">
                            <?php else: ?>
                                Tidak ada foto
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($data['name']) ?></td>
                        <td><?= htmlspecialchars($data['class']) ?></td>
                        <td><?= htmlspecialchars($data['age']) ?></td>
                        <td><?= htmlspecialchars($data['school']) ?></td>
                        <td>
                        <form action="delete.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="image" value="<?= htmlspecialchars($data['image']) ?>">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($data['name']) ?>">
                            <input type="hidden" name="class" value="<?= htmlspecialchars($data['class']) ?>">
                            <input type="hidden" name="age" value="<?= htmlspecialchars($data['age']) ?>">
                            <input type="hidden" name="school" value="<?= htmlspecialchars($data['school']) ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">No data uploaded yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
