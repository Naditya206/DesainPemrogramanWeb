<html>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        Name: <input type="text" name="fname">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = isset($_POST['fname']) ? trim($_POST['fname']) : '';

        if (empty($name)) {
            echo "Name is empty";
        } else {
            echo "Hello, " . htmlspecialchars($name) . "!";
        }
    }
    ?>
</body>
</html>
