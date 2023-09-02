<table>
    <tr>
        <th>id</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Tipo Documento</th>
        <th>Número documento</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Rol</th>
        <th>Acciones</th>
    </tr>
    <?php
    $select = 'SELECT * FROM registropersonas ORDER BY id ASC';
    $query = mysqli_query($conn, $select);

    while ($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nombres']."</td>";
        echo "<td>".$row['apellidos']."</td>";
        echo "<td>".$row['tipo_doc']."</td>";
        echo "<td>".$row['num_doc']."</td>";
        echo "<td>".$row['correo']."</td>";
        echo "<td>".$row['telefono']."</td>";
        echo "<td>".$row['rol']."</td>";
        echo "<td>";
        echo "<button class='action'>";
        echo "<svg stroke='currentColor' fill='none' stroke-width='2' viewBox='0 0 24 24' stroke-linecap='round' stroke-linejoin='round' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'>
        <path d='M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7'></path>
        <path d='M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z'></path>
      </svg>";
        echo "</button>";

        echo "<button class='action'>";
        echo "<svg stroke='currentColor' fill='currentColor' stroke-width='0' viewBox='0 0 1024 1024' height='1em' width='1em' xmlns='http://www.w3.org/2000/svg'>
        <path d='M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z'></path>
      </svg>";
        echo "</button>";

        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>