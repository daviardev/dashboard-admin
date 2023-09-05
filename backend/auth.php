<?php
    include('conexion.php');

    if (!isset($_SESSION['admin_name'])) {
        header('location:../index.php');
    } else if (!isset($_SESSION['aprendiz_name'])) {
        header('location:../index.php');
    } else if (!isset($_SESSION['instructor_name'])) {
        header('location:../index.php');
    }
?>