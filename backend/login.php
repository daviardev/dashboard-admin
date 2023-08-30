<?php
session_start();

include('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['num_doc'];
    $password = $_POST['contraseña'];
  
    // Buscar un usuario con el correo electrónico
    $query = 'SELECT * FROM registros WHERE correos = $email';
    $resultado = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($resultado) == 1) {
      $fila = mysqli_fetch_assoc($resultado);
      $ValidarContraseñas = $fila['contraseña'];
      // Comparar la contraseña ingresada con la contraseña almacenada hasheada
      if (password_verify($password, $ValidarContraseñas)) {
        $_SESSION['usuario_id'] = $fila['id'];
        $_SESSION['num_doc'] = $fila;
        $_SESSION['login'] = 'OK';
  
        if ($fila['rol'] == 3) { //Administrador
          header('Location: ../admin.php');
          exit;
        } else if ($fila['rol'] == 4) { //Instructor
          header('Location: ../instructor.php');
          exit;
        } else {
          header('Location: ../index.php');
          exit;
        }
      } else {
        $errorLogin = 'Contraseña incorrecta.';
        exit;
      }
    } else {
      $errorLogin = 'Usuario no encontrado.';
      exit;
    }
  }

mysqli_close($conn);

?>