<?php
    $password = '';
    $user = 'root';
    $host = 'dasboard-app.dvl.to';
    $db = 'DashData';

    $conn = mysqli_connect($host, $user, $password, $db);

    !$conn && die('Error en la conexión: '.mysqli_connect_error());
?>