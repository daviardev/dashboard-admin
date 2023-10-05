<?php include('../../backend/conexion.php');

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    $aprendices = isset($_POST['aprendices']) ? $_POST['aprendices'] : '';
    $numFichas = isset($_POST['num_ficha']) ? $_POST['num_ficha'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

    $update = "UPDATE aprendices SET id_persona = '$aprendices', id_ficha = '$numFichas', estado = '$estado' WHERE id = '$id'";
    $result = mysqli_query($conn, $update);

    header('Location:../../views/aprendices.php');
} else {
    $id = $_GET['id'];
    $select = "SELECT * FROM aprendices WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    $show = mysqli_fetch_assoc($result);
}
?>


<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='../../src/img/favicon.png' type='image/x-icon'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='../../css/admin.css'>
    <title>Administrador · Registrar usuarios (<?php echo $_SESSION['admin_name'] ?>)</title>
</head>

<body>
    <nav class='sidebar close'>
        <header>
            <div class='image-text'>
                <span class='image'>
                    <img src='../../src/img/favicon.png' alt='logo' />
                </span>
                <div class='text logo-text'>
                    <span class='name'><?php echo $_SESSION['admin_name'] ?></span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class='menu-bar'>
            <div class='menu'>
                <ul class='menu-links'>
                    <li class='nav-link'>
                        <a href='../../views/programas.php'>
                            <i class='bx bx-add-to-queue icon'></i>
                            <span class='text nav-text'>Programas</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='../../admin.php'>
                            <i class='bx bx-user icon'></i>
                            <span class='text nav-text'>Usuarios</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='../../views/fichas.php'>
                            <i class='bx bx-archive icon'></i>
                            <span class='text nav-text'>Fichas</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='../../views/aprendices.php'>
                            <i class='bx bx-user-plus icon'></i>
                            <span class='text nav-text'>Aprendices</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='../../views/instructores.php'>
                            <i class='bx bx-user-voice icon'></i>
                            <span class='text nav-text'>Instructores</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class='bottom-content'>
                <li class='nav-link'>
                    <a href='./backend/logout.php'>
                        <i class='bx bx-log-out icon'></i>
                        <span class='text nav-text'>Cerrar sesión</span>
                    </a>
                </li>
                <li class='mode'>
                    <div class='sun-moon'>
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class='mode-text text'>Dark mode</span>
                    <div class='toggle-switch'>
                        <span class='switch'></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>
    <div class='wrapper'>
        <div class='inner'>
            <form action='<?= $_SERVER['PHP_SELF'] ?>' class='form' method='POST'>
                <h2>Editar usuario</h2>

                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo "
                        <div class='alert alert-error'>
                            <p>" . $error . "</p>
                        </div>
                        ";
                    }
                }
                ?>
                <div class='form-wrapper'>
                    <label>aprendices</label>
                    <select name='aprendices' class='form-control'>
                        <?php
                        $idaprendices = "SELECT * FROM registropersonas WHERE rol = 12";
                        $query = mysqli_query($conn, $idaprendices);


                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                              <option value='" . $row['id'] . "'>"
                                . $row['nombres'] . ' ' . $row['apellidos'] .
                                "</option>
                            ";
                        }
                        ?>
                    </select>
                </div>

                <div class='form-wrapper'>
                    <label>Número de ficha</label>
                    <select name='num_ficha' class='form-control'>
                        <?php
                        $numFichas = "SELECT * FROM fichas";
                        $query = mysqli_query($conn, $numFichas);

                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                                    <option value='" . $row['id'] . "'>"
                                . $row['ficha'] .
                                "</option>
                                ";
                        }
                        ?>
                    </select>
                </div>
                <div class='form-wrapper'>
                    <label>Estado</label>
                    <select name='estado' class='form-control'>
                        <?php
                        $fichas = 'SELECT * FROM sub_items WHERE id_items = 6';
                        $query = mysqli_query($conn, $fichas);

                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                              <option value='" . $row['id'] . "'>"
                                . $row['description'] .
                                "</option>
                            ";
                        }
                        ?>
                    </select>
                </div>
        </div>
        <div class='form-wrapper'>
            <center>
                <input type='hidden' name='id' value='<?php echo $id; ?>' />
                <button type='submit' name='submit' class='btn'>
                    Actualizar ficha
                </button>
            </center>
        </div>
        </form>
    </div>
    </div>
</body>
<script type='module' src='../../js/sidebar.js'></script>
<script type='module' src='../../js/modal.js'></script>

</html>