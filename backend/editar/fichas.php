<?php include('../../backend/conexion.php');

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    $nomPrograma = isset($_POST['nombre_programa']) ? $_POST['nombre_programa'] : '';
    $numFicha = isset($_POST['num_ficha']) ? $_POST['num_ficha'] : '';
    $alias = isset($_POST['alias']) ? $_POST['alias'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

    $update = "UPDATE fichas SET programa = '$nomPrograma', ficha = '$numFicha', alias = '$alias', estado = '$estado' WHERE id = '$id'";
    $result = mysqli_query($conn, $update);

    header('Location:../../views/fichas.php');
} else {
    $id = $_GET['id'];
    $select = "SELECT * FROM fichas WHERE id = '$id'";
    $result = mysqli_query($conn, $select);

    $show = mysqli_fetch_assoc($result);

    $numFicha = $show['ficha'];
    $alias = $show['alias'];
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
    <title>Administrador · Registrar programas (<?php echo $_SESSION['admin_name'] ?>)</title>
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
                    <li class="nav-link">
                        <a href="../../views/aprendices.php">
                            <i class="bx bx-user-plus icon"></i>
                            <span class="text nav-text">Aprendices</span>
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
            <form action='<?= $_SERVER['PHP_SELF'] ?>' class='form' method='post'>
                <h2>Registrar programas</h2>
                <div class='form-wrapper'>
                    <label>Programa</label>
                    <select name='nombre_programa' class='form-control'>
                        <?php
                        $nombrePrograma = 'SELECT * FROM programas';
                        $query = mysqli_query($conn, $nombrePrograma);

                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                              <option value='" . $row['id'] . "'>"
                                . $row['nombre_programa'] .
                                "</option>
                            ";
                        }
                        ?>
                    </select>
                </div>

                <div class='form-wrapper'>
                    <label>Número de ficha</label>
                    <input type='number' name='num_ficha' class='form-control' value='<?php echo $numFicha; ?>' />
                </div>

                <div class='form-group'>
                    <div class='form-wrapper'>
                        <label>Alias</label>
                        <input type='text' name='alias' class='form-control' value='<?php echo $alias; ?>' />
                    </div>

                    <div class='form-wrapper'>
                        <label>Estado</label>
                        <select name='estado' class='form-control'>
                            <?php
                            $fichas = 'SELECT * FROM sub_items WHERE id_items = 5';
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