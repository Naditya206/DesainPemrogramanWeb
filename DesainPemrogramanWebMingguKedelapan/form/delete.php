<?php
$target_dir = "uploads/";
$data_file = "uploads/data.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_POST['image'];
    $name = $_POST['name'];  
    $class = $_POST['class']; 
    $age = $_POST['age']; 
    $school = $_POST['school']; 

    if (!empty($image)) {
        $file_path = $target_dir . $image;
        if (file_exists($file_path)) {
            unlink($file_path);  
        }
    }

    if (file_exists($data_file)) {
        $lines = file($data_file, FILE_IGNORE_NEW_LINES);  
        $newLines = [];

        foreach ($lines as $line) {
            $data = explode('|', $line);

            if (count($data) >= 5) {
                $stored_name = $data[0];
                $stored_class = $data[1];
                $stored_age = $data[2];
                $stored_school = $data[3];
                $stored_image = $data[4];

                if ($stored_name !== $name || $stored_class !== $class || $stored_age !== $age || $stored_school !== $school || $stored_image !== $image) {
                    $newLines[] = $line;  
                }
            }
        }

        if (!empty($newLines)) {
            file_put_contents($data_file, implode(PHP_EOL, $newLines) . PHP_EOL);
        } else {
            file_put_contents($data_file, '');
        }
    }

    header("Location: form.php");
    exit;
}
