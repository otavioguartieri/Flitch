<?php
$servidor = "localhost";
$usuario = "root";
$senha = "pk0ay18MchHQZcfl";
$dbname = "testechat";
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
if (!$conn) {
    echo 'Error DB Connection';
}
