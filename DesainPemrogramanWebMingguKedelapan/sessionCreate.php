<?php
session_start(); // Memulai sesi

// Menetapkan variabel sesi
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";

echo "Session variables are set.";
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Session Set</h2>
    <p>Session variables have been created.</p>
</body>
</html>
