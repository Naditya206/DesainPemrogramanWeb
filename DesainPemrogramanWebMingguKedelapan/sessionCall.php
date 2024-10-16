<?php
session_start(); // Memulai sesi
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Session Variables</h2>
    <?php
    // Memeriksa apakah variabel sesi ada
    if (isset($_SESSION["favcolor"]) && isset($_SESSION["favanimal"])) {
        echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
        echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
    } else {
        echo "Session variables are not set.";
    }
    ?>
</body>
</html>
