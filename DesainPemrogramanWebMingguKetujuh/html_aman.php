<!DOCTYPE html>
<html>
<head>
    <title>Form Input PHP</title>
</head>
<body>
<h2>Form Input PHP</h2>

<?php
// Inisialisasi variabel
$inputErr = "";
$emailErr = "";
$input = "";
$email = "";

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input teks dan amankan
    $input = $_POST['input'];
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    // Validasi email
    if (isset($_POST['email'])) { // Cek apakah email diset
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Data yang Anda masukkan: " . $input . "<br>";
            echo "Email yang Anda masukkan: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        } else {
            $emailErr = "Email tidak valid. Silakan masukkan email yang benar.";
        }
    } else {
        $emailErr = "Email harus diisi.";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="input">Input: </label>
    <input type="text" name="input" id="input" value="<?php echo $input; ?>" required>
    <span class="error" style="color:red;"><?php echo $inputErr; ?></span>
    <br><br>
    
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
    <span class="error" style="color:red;"><?php echo $emailErr; ?></span>
    <br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
