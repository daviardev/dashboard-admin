<?php
    include('conexion.php');

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipo_doc = $_POST['tipo_doc'];
    $num_doc = $_POST['num_doc'];
    $rol = $_POST['rol'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    $query = 'SELECT COUNT(*) AS total FROM registroPersonas WHERE num_doc = $num_doc OR correo = $correo OR contraseña = $contraseña';
    $exist = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($exist);
    $total = $row['total'];

    if ($total > 0)
        echo '
            <div class="">
                Los datos ya están registrados
            </div>
        ';
?>