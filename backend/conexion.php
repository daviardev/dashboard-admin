<?php
    $password = '';
    $user = 'root';
    $host = 'localhost';
    $db = 'dash-data';

    $conn = mysqli_connect($host, $user, $password, $db);

    !$conn && die('Error en la conexión: '.mysqli_connect_error());
?>