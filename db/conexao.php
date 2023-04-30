<?php
    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "flitch";
    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        echo 'Error DB Connection';
    }
?>