<?php include './backend/conexion.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
  header('location:./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lastName = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
    $phoneNum = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $typeDoc = isset($_POST['tipo_doc']) ? $_POST['tipo_doc'] : '';
    $numDoc = isset($_POST['num_doc']) ? $_POST['num_doc'] : '';
    $name = isset($_POST['nombres']) ? $_POST['nombres'] : '';
    $email = isset($_POST['correo']) ? $_POST['correo'] : '';
    $user_type = isset($_POST['rol']) ? $_POST['rol'] : '';

    $pass = md5(isset($_POST['contraseña']) ? $_POST['contraseña'] : '');

    $select = "SELECT * FROM registropersonas WHERE nombres = '$name' OR apellidos = '$lastName' OR num_doc = '$numDoc' OR correo = '$email' OR telefono = '$phoneNum' OR contraseña = '$pass'";

    $query = mysqli_query($conn, $select);

    if(mysqli_num_rows($query) > 0){
        $error[] = 'El usuario que intenta registrar, ya está registrado.';
    } else {
        $insert = "INSERT INTO registropersonas (nombres, apellidos, tipo_doc, num_doc, correo, telefono, rol, contraseña) VALUES ('$name', '$lastName', '$typeDoc', '$numDoc', '$email', '$phoneNum', '$user_type', '$pass')";
          
        if (mysqli_query($conn, $insert)) {
            header('location: ./admin.php');
        }
    
        mysqli_close($conn);
    }
}
?>


<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='./src/img/favicon.jpeg' type='image/x-icon'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='./css/admin.css'>
    <title>Administrador · Registrar usuarios</title>
</head>

<body>
<nav class='sidebar close'>
    <header>
        <div class='image-text'>
            <span class='image'>
                <img src='https://avatars.githubusercontent.com/u/65743790?v=4' alt='logo' />
            </span>
            <div class='text logo-text'>
                <span class='name'><?php echo $_SESSION['admin_name'] ?></span>
                <span class='profession'><?php echo $_SESSION['rol'] ?></span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class='menu-bar'>
        <div class='menu'>
            <ul class='menu-links'>
                <li class='nav-link'>
                    <a href='#'>
                        <i class='bx bx-home-alt icon'></i>
                        <span class='text nav-text'>Inicio</span>
                    </a>
                </li>
                <li class='nav-link'>
                    <a href='#'>
                        <i class='bx bx-user icon'></i>
                        <span class='text nav-text'>Registrar usuarios</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class='bottom-content'>
            <li class='nav-link'>
                <a href='../dashboard-admin/backend/logout.php'>
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
      <form action='' class='form' method='post'>
        <h2>ingresar nuevos usuarios</h2>
        
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
          <label>Tipo de documento</label>
          <select name='tipo_doc' class='form-control'>
            <?php
              $tipo_doc = 'SELECT * FROM sub_items WHERE id_items = 2';
              $query = mysqli_query($conn, $tipo_doc);

              while ($row = mysqli_fetch_array($query)) {
                echo "
                  <option value='".$row['id']."'>"
                    .$row['description'].
                  "</option>
                ";
              }
            ?>
          </select>
        </div>

        <div class='form-wrapper'>
          <label>Número de documento</label>
          <input
            type='number'
            name='num_doc'
            class='form-control'
            required
          />
        </div>
        
        <div class='form-group'>
          <div class='form-wrapper'>
            <label>Nombres</label>
            <input
              type='text'
              name='nombres'
              class='form-control'
              required
            />
          </div>

          <div class='form-wrapper'>
            <label>Apellidos</label>
            <input
              type='text'
              name='apellidos'
              class='form-control'
              required
            />
          </div>
        </div>
        
        <div class='form-wrapper'>
          <label>Correo</label>
          <input
            type='email'
            name='correo'
            class='form-control'
            required
          />
        </div>
        
        <div class='form-group'>
          <div class='form-wrapper'>
            <label>Teléfono</label>
            <input
              type='number'
              name='telefono'
              class='form-control'
              required
            />
          </div>
          
          <div class='form-wrapper'>
            <label>Rol de usuario</label>
            <select name='rol' class='form-control'>
            <?php
              $tipo_doc = 'SELECT * FROM sub_items WHERE id_items = 1';
              $query = mysqli_query($conn, $tipo_doc);

              while ($row = mysqli_fetch_array($query)) {
                echo "
                  <option value='".$row['id']."'>"
                    .$row['description'].
                  "</option>
                ";
              }
            ?>
          </select>
          </div>
        </div>
        <div class='form-wrapper'>
          <label>Contraseña</label>
          <input
            type='password'
            name='contraseña'
            class='form-control'
            required
          />
        </div>
        
        <div class='form-wrapper'>
          <center>
            <button type='submit' name='submit' class='btn'>Registrar usuario</button>
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
        <h2>Usuarios registrados</h2>
        <?php include('./components/tabla.php') ?>
    </div>
  </div>
  </div>
</body>

<script type="module" src='./js/modal.js'></script>
<script type='module' src='./js/sidebar.js'></script>

</html>