<?php include './backend/conexion.php'; ?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='./src/img/favicon.jpeg' type='image/x-icon'>
    <link rel='stylesheet' href='./css/admin.css'>
    <title>Administrador · Registrar usuarios</title>
</head>

<body>
  <?php include('./components/sidebar.php') ?>

  <div class='wrapper'>
    <div class='inner'>
      <form action='' class='form'>
        <h2>ingresar nuevos usuarios</h2>
        
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
          <input type='number' name='num_doc' class='form-control' />
        </div>
        
        <div class='form-group'>
          <div class='form-wrapper'>
            <label>Nombres</label>
            <input type='text' name='names' class='form-control' />
          </div>

          <div class='form-wrapper'>
            <label>Apellidos</label>
            <input type='text' name='last_names' class='form-control' />
          </div>
        </div>
        
        <div class='form-wrapper'>
          <label>Correo</label>
          <input type='email' name='email' class='form-control' />
        </div>
        
        <div class='form-group'>
          <div class='form-wrapper'>
            <label>Teléfono</label>
            <input type='number' name='phone_num' class='form-control' />
          </div>
          
          <div class='form-wrapper'>
            <label>Rol de usuario</label>
            <select name='user_rol' class='form-control'>
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
          <input type='password' name='password' class='form-control' />
        </div>
        
        <div class='form-wrapper'>
          <center>
            <button class='btn'>Registrar usuario</button>
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
</html>