<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="./css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<nav class='sidebar close'>
    <header>
        <div class='image-text'>
            <span class='image'>
                <img src='https://avatars.githubusercontent.com/u/65743790?v=4' alt='logo' />
            </span>
            <div class='text logo-text'>
                <span class='name'>daviardev</span>
                <span class='profession'>Administrador</span>
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
                <a href='#'>
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
<script type='module' src='./js/sidebar.js'></script>

</html>