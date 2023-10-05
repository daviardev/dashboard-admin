<?php include('../../backend/conexion.php');

session_start();

if (!isset($_SESSION['admin_name'])) {
  header('location:./index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = isset($_POST['id']) ? $_POST['id'] : '';
  $names = isset($_POST['nombres']) ? $_POST['nombres'] : '';
  $lastName = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
  $email = isset($_POST['correo']) ? $_POST['correo'] : '';
  $phoneNum = isset($_POST['telefono']) ? $_POST['telefono'] : '';
  $user_type = isset($_POST['rol']) ? $_POST['rol'] : '';

  $update = "UPDATE registropersonas SET nombres = '$names', apellidos = '$lastName', correo = '$email', telefono = '$phoneNum', rol = '$user_type' WHERE id = '$id'";
  $query = mysqli_query($conn, $update);

  header('Location:../../admin.php');
} else {
  $id = $_GET['id'];
  $select = "SELECT * FROM registropersonas WHERE id = '$id'";

  $query = mysqli_query($conn, $select);

  $row = mysqli_fetch_assoc($query);
  $names = $row['nombres'];
  $lastName = $row['apellidos'];
  $email = $row['correo'];
  $phoneNum = $row['telefono'];
  $user_type = $row['rol'];
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
          <img
            src='../../src/img/favicon.png'
            alt='logo'
          />
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
      <form action='<?=$_SERVER['PHP_SELF']?>' class='form' method='POST'>
        <h2>Editar usuario</h2>

        <?php
        if (isset($error)) {
          foreach ($error as $error) {
            echo "
            <div class='alert alert-error'>
              <p>".$error."</p>   
            </div>
            ";
          }
        }
        ?>
        
        <div class='form-group'>
          <div class='form-wrapper'>
            <label>Nombres</label>
            <input
              type='text'
              name='nombres'
              class='form-control'
              value='<?php echo $names; ?>'
            />
          </div>

          <div class='form-wrapper'>
            <label>Apellidos</label>
            <input
              type='text'
              name='apellidos'
              class='form-control'
              value='<?php echo $lastName; ?>'
            />
          </div>
        </div>

        <div class='form-wrapper'>
          <label>Correo</label>
          <input
            type='email'
            name='correo'
            class='form-control'
            value='<?php echo $email; ?>'
          />
        </div>

        <div class='form-group'>
          <div class='form-wrapper'>
            <label>Teléfono</label>
            <input
              type='number'
              name='telefono'
              class='form-control'
              value='<?php echo $phoneNum; ?>'
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
          <center>
            <input
              type='hidden'
              name='id'
              value='<?php echo $id; ?>'
            />
            <button type='submit' class='btn'>
              Actualizar usuario
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