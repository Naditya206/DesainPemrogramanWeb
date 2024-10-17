<?php
$alertMessage = "";
$alertType = "";
$target_dir = "uploads/";
$data_file = "uploads/data.txt";  

function saveUploadedData($data_file, $name, $class, $age, $school, $image = null) {
    $entry = $name . "|" . $class . "|" . $age . "|" . $school . "|" . $image . PHP_EOL;
    file_put_contents($data_file, $entry, FILE_APPEND);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $age = $_POST['age'];
    $school = $_POST['school'];
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : null;

    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = $image ? strtolower(pathinfo($target_file, PATHINFO_EXTENSION)) : null;

    if (!empty($image)) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $alertMessage = "File is not an image.";
            $alertType = "error";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 2000000) {
            $alertMessage = "Sorry, your file is too large.";
            $alertType = "warning";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $alertMessage = "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $alertType = "warning";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $alertMessage = "The file " . htmlspecialchars(basename($image)) . " has been uploaded.";
                $alertType = "success";
            } else {
                $alertMessage = "Sorry, there was an error uploading your file.";
                $alertType = "error";
                $uploadOk = 0;
            }
        }
    }

    if ($uploadOk == 1 || empty($image)) {
        saveUploadedData($data_file, $name, $class, $age, $school, $image);
        $alertMessage = "Data has been saved.";
        $alertType = "success";
    }

    header("Location: form.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . $alertType);
    exit;
}
?>
