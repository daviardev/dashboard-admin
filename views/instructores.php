<?php include '../backend/conexion.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idInstructor = isset($_POST['nombre_instructor']) ? $_POST['nombre_instructor'] : '';
    $idFicha = isset($_POST['num_ficha']) ? $_POST['num_ficha'] : '';
    
    $select = "SELECT * FROM instructores WHERE id_persona = '$idInstructor' AND id_ficha = '$idFicha'";
    $query = mysqli_query($conn, $select);

    if (mysqli_num_rows($query) > 0) {
        $error[] = 'El instructor que quiere asignar, ya tiene una ficha asignada.';
      } else {
        $insert = "INSERT INTO instructores (id_persona, id_ficha) VALUES ('$idInstructor', '$idFicha')";
    
        if (mysqli_query($conn, $insert)) {
          header('Refresh:0');
        }
      }

    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];

        $delete = "DELETE FROM instructores WHERE id = $userId";

        if (mysqli_query($conn, $delete)) {
            header('Refresh:0');
        } else {
            $error[] = 'Error al eliminar el usuario';
        }
    }
}
?>


<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='../src/img/favicon.png' type='image/x-icon'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='../css/admin.css'>
    <title>Administrador · Asignar instructores (<?php echo $_SESSION['admin_name'] ?>)</title>
</head>

<body>
    <nav class='sidebar close'>
        <header>
            <div class='image-text'>
                <span class='image'>
                    <img src='../src/img/favicon.png' alt='logo' />
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
                        <a href='programas.php'>
                            <i class='bx bx-add-to-queue icon'></i>
                            <span class='text nav-text'>Programas</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='../admin.php'>
                            <i class='bx bx-user icon'></i>
                            <span class='text nav-text'>Usuarios</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='fichas.php'>
                            <i class='bx bx-archive icon'></i>
                            <span class='text nav-text'>Fichas</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="./aprendices.php">
                            <i class="bx bx-user-plus icon"></i>
                            <span class="text nav-text">Aprendices</span>
                        </a>
                    </li>
                    <li class='nav-link'>
                        <a href='./instructores.php'>
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
            <form class='form' method='post'>
                <h2>Asignar instructores</h2>

                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo "
                        <div class='error-txt'>"
                          .$error.
                        "</div>
                      ";
                    }
                }
                ?>
                <div class='form-wrapper'>
                    <label>Nombre instructor</label>
                    <select name='nombre_instructor' class='form-control'>
                        <?php
                        $select = 'SELECT * FROM registropersonas WHERE rol = 11';
                        $query = mysqli_query($conn, $select);

                        while ($row = mysqli_fetch_array($query)) {
                            echo "
                              <option value='".$row['id']."'>"
                                .$row['nombres'].' '.$row['apellidos'].
                              "</option>
                            ";
                        }
                        ?>
                    </select>
                </div>

                <div class='form-wrapper'>
                    <label>Alias de la ficha</label>
                    <select name='num_ficha' class='form-control'>
                        <?php
                            $select = 'SELECT * FROM fichas';
                            $query = mysqli_query($conn, $select);

                            while ($row = mysqli_fetch_array($query)) {
                                echo "
                                    <option value='".$row['id']."'>"
                                        .$row['alias'].
                                    "</option>
                                ";
                            }
                        ?>
                    </select>
                </div>

                <div class='form-wrapper'>
                    <center>
                      <button type='submit' name='submit' class='btn'>
                        Asignar instructor
                    </button>
                    </center>
                </div>
            </form>
        </div>
        <button id='openModalBtn' class='floating-button'>
            <i class='bx bx-table'></i>
        </button>
        <div id='modal' class='modal'>
            <div class='modal-content'>
                <span class='close' id='closeModalBtn'>&times;</span>
                <h2>Fichas asignadas</h2>
                <table>
                    <tr>
                        <th>id</th>
                        <th>Nombre del instructor</th>
                        <th>Ficha</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                    $select = "SELECT instructores.id, CONCAT(registropersonas.nombres,' ',registropersonas.apellidos) AS nombreCompleto, fichas.alias FROM instructores INNER JOIN registropersonas ON instructores.id_persona = registropersonas.id INNER JOIN fichas ON instructores.id_ficha = fichas.id";
                    $query = mysqli_query($conn, $select);

                    while ($row = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nombreCompleto']."</td>";
                        echo "<td>" . $row['alias'] . "</td>";

                        echo "
                        <td>
                          <button
                            class='action'
                          >
                          <a href='../backend/editar/instructores.php?id=" . $row['id'] . "'>
                            <svg
                              stroke='currentColor'
                              fill='none'
                              stroke-width='2'
                              viewBox='0 0 24 24'
                              stroke-linecap='round'
                              stroke-linejoin='round'
                              height='1em'
                              width='1em'
                              xmlns='http://www.w3.org/2000/svg'
                            >
                              <path
                                d='M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7'
                              />
                              <path
                                d='M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z'
                              />
                            </svg>
                            </a>
                          </button>

                          <form method='post' action=''>
                            <input
                              type='hidden'
                              name='userId'
                              value='" . $row['id'] . "'
                            />

                            <button
                              class='action'
                              type='submit'
                            >
                              <svg
                                stroke='currentColor'
                                fill='currentColor'
                                stroke-width='0'
                                viewBox='0 0 1024 1024'
                                height='1em'
                                width='1em'
                                xmlns='http://www.w3.org/2000/svg'
                              >
                                <path
                                  d='M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z'
                                />
                              </svg>
                            </button>
                          </form>
                        </td>
                        </tr>
                      ";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div id='modal' class='modal'>
            <div class='modal-content'>
                <span class='close' id='closeModalBtn'>&times;</span>
                <?php
                if (isset($_GET['id'])) {
                    $edit = $_GET['id'];

                    $editQuery = "SELECT * FROM registropersonas WHERE id = $edit";
                    $result = mysqli_query($conn, $editQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        $id = $row['id'];
                        $name = $row['nombres'];
                        $lastname = $row['apellidos'];
                        $tipo_doc = $row['tipo_doc'];
                        $numDoc = $row['num_doc'];
                        $email = $row['correo'];
                        $rol = $row['rol'];
                        $pass = $row['contraseña'];

                        echo "
                        <form action='' class='form' method='post'>
                        <h2>ingresar nuevos usuarios</h2>
                
                        <div class='form-wrapper'>
                            <label>Número de documento</label>
                            <input
                            type='number'
                            name='num_doc'
                            class='form-control'
                            />
                        </div>
                
                        <div class='form-group'>
                            <div class='form-wrapper'>
                            <label>Nombres</label>
                            <input
                                type='text'
                                name='nombres'
                                class='form-control'
                            />
                            </div>
                
                            <div class='form-wrapper'>
                            <label>Apellidos</label>
                            <input
                                type='text'
                                name='apellidos'
                                class='form-control'
                            />
                            </div>
                        </div>
                
                        <div class='form-wrapper'>
                            <label>Correo</label>
                            <input
                            type='email'
                            name='correo'
                            class='form-control'
                            />
                        </div>
                
                        <div class='form-group'>
                            <div class='form-wrapper'>
                            <label>Teléfono</label>
                            <input
                                type='number'
                                name='telefono'
                                class='form-control'
                            />
                            </div>
                
                        </div>
                        <div class='form-wrapper'>
                            <label>Contraseña</label>
                            <input
                            type='password'
                            name='contraseña'
                            class='form-control'
                            />
                        </div>
                
                        <div class='form-wrapper'>
                            <center>
                            <button type='submit' name='submit' class='btn'>
                                Actualizar usuario
                            </button>
                            </center>
                        </div>
                        </form>
                        ";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    </div>
</body>
<script type='module' src='../js/sidebar.js'></script>
<script type='module' src='../js/modal.js'></script>

</html>