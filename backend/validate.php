<?php
    session_start();

    include('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numberDoc = $_POST['num_doc'];
        $pass = $_POST['contraseñas'];

        $query = 'SELECT * FROM registroPersonas WHERE num_doc = $numberDoc';
        $result = mysqli_query($conn, $query);
    }
?>