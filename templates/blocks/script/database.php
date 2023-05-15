<?php
    $hostName = "localhost";
    $dbUser = "Valeriia";
    $dbPassword = "34444356";
    $dbName = "sketch_your_point_db";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

    if(!$conn) {
        die("Something went wrong;");
    }

?>