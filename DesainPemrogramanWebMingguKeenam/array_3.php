<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Multidimensional Array</title>
</head>
<body>
    <h2>Multidimensional Array</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Judul Film</th>
            <th>Tahun</th>
            <th>Rating</th>
        </tr>

        <?php
        // Definisi array multidimensional untuk film
        $movies = array(
            array("Avengers: Infinity War", 2018, 8.7),
            array("The Avengers", 2012, 8.1),
            array("Guardians of the Galaxy", 2014, 8.1),
            array("Iron Man", 2008, 7.9)
        );

        // Menampilkan data film menggunakan perulangan
        foreach ($movies as $movie) {
            echo "<tr>";
            echo "<td>" . $movie[0] . "</td>";
            echo "<td>" . $movie[1] . "</td>";
            echo "<td>" . $movie[2] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
