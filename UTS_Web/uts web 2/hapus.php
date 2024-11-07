<?php
include 'db.php';

if (isset($_POST['ids'])) {
    $ids = $_POST['ids'];
    $query = "DELETE FROM Siswa WHERE id IN (" . implode(',', array_fill(0, count($ids), '?')) . ")";
    $stmt = $conn->prepare($query);
    $stmt->execute($ids);
}

header("Location: index.php?deleted=1"); 
exit();
?>
