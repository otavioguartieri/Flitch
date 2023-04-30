<?php
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "pk0ay18MchHQZcfl";
    $dbname = "flitch";
    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        echo 'Error DB Connection';
    }
?>