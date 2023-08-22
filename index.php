<?php include('./backend/conexion.php') ?>

<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='shortcut icon' href='/src/img/favicon.jpeg' type='image/x-icon'>
    <title>Iniciar sesión · Centro de registros</title>
    <link rel='stylesheet' href='/css/login.css'>
</head>
<body>
    <div class='container-login'>
        <section class='content-login'>
            <form action='' class='form-login'>
                <img
                   src='/src/img/logoSofia.png'
                   alt='Logo Sofia Plus'
                />
                <h2 class='title-login'>ingreso usuarios registrados</h2>
                <div class='input-content'>
                    <input
                      type='text'
                      class='input'
                      name='numberDocument'
                      placeholder='Número de Documento'
                    />
                    <svg
                        fill='currentColor'
                        class='icon-input'
                        xmlns='http://www.w3.org/2000/svg'
                        width='1em'
                        height='1em'
                        stroke='currentColor'
                        viewBox='0 0 448 512'
                        stroke-width='0'
                    >
                        <path
                            d='M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z' 
                        />
                    </svg>
                </div>
                <div class='input-content'>
                    <input
                      type='password'
                      class='input'
                      name='numberDocument'
                      placeholder='Contraseña'
                    />
                    <svg
                        fill='currentColor'
                        class='icon-input'
                        width='1em'
                        xmlns='http://www.w3.org/2000/svg'
                        stroke='currentColor'
                        height='1em'
                        viewBox='0 0 24 24'
                        stroke-width='0'
                    >
                    <path
                        fill='none'
                        d='M0 0h24v24H0V0z'>
                    </path>
                    <path d='M2 17h20v2H2v-2zm1.15-4.05L4 11.47l.85 1.48 1.3-.75-.85-1.48H7v-1.5H5.3l.85-1.47L4.85 7 4 8.47 3.15 7l-1.3.75.85 1.47H1v1.5h1.7l-.85 1.48 1.3.75zm6.7-.75l1.3.75.85-1.48.85 1.48 1.3-.75-.85-1.48H15v-1.5h-1.7l.85-1.47-1.3-.75L12 8.47 11.15 7l-1.3.75.85 1.47H9v1.5h1.7l-.85 1.48zM23 9.22h-1.7l.85-1.47-1.3-.75L20 8.47 19.15 7l-1.3.75.85 1.47H17v1.5h1.7l-.85 1.48 1.3.75.85-1.48.85 1.48 1.3-.75-.85-1.48H23v-1.5z'></path></svg>
                </div>
                    <a href='/pages/forgot-pass.html' class='forgot-pass'>
                    <svg
                        fill='currentColor'
                        xmlns='http://www.w3.org/2000/svg'
                        width='1em'
                        stroke='currentColor'
                        height='1em'
                        viewBox='0 0 16 16'
                        stroke-width='0'
                    >
                    <path
                        d='M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'
                    >
                    </svg>
                        Olvidé mi contraseña
                    </a>
                <div class='content-button'>
                    <button class='btn' type='button'>
                        ingresar
                    </button>
                </div>
                <div style='padding-bottom: 23px; padding-top: 42px;' />
            </form>
        </section>
    </div>
</body>
</html>