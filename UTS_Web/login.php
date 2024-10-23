<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid_username = "adit";
    $valid_password = "adit123";

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;


        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + (86400 * 30), "/"); 
        }

        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }

    session_start();
    session_destroy(); 
    header("Location: login.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input-group">
                <input type="checkbox" name="remember" id="remember">Remember Me
            </div>
            <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
            <div class="input-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
