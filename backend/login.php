<?php
    session_start();

    include('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numberDoc = $_POST['num_doc'];
        $pass = $_POST['contraseña'];

        $query = 'SELECT * FROM registropersonas WHERE num_doc = $numberDoc';
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $validatePass = $row['contraseña'];

            if (password_verify($pass, $validatePass)) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user'] = $row;
                $_SESSION['login'] = 'Autenticado';

                if ($row['rol' === 3]) {
                    $location = '../admin.php';
                } else if ($row['rol'] === 4) {
                    $location = '../instructor.php';
                } else {
                    $location = '../index.php';
                }

                if (isset($location)) {
                    header('Location: $location');
                    exit;
                } else {
                    $errorLogin = 'Usuario no registrado';
                    exit;
                }
            } else {
                $errorLogin = 'Usuario o contraseña incorrectos';
                exit;
            }
        }
    }

    mysqli_close($conn);
?>