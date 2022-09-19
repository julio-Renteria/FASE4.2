<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Insertar descripción aquí." />

    <link rel="shortcut icon" href="vistas/images/lolo1.png" />
    <link rel="icon" type="vistas/image/logo.svg" href="vistas/images/icon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="vistas/assets/css/styles.css" />

    <title>Proyecto</title>
</head>

<header>
    <img class="logo" src="vistas/images/logo.svg" alt="Logo" />
</header>



<body>
    <div class="container_login_page">
        <div class="div_video_login_page">
            <video class="video_login_page" onloadedmetadata="this.muted=true" autoplay loop>
                <source src="vistas/images/video_login.mp4" />
            </video>
        </div>
        <div class="div_form_login_page">
            <i class="fa-solid fa-circle-user"></i>
            <h1>Inicio de Sesión</h1>

            
            <form class="form_login_page" method="post" action="db/conexion.php">
                <label>Usuario:</label>
                <input type="text" id="user" name="user" placeholder="Ingresa tu usuario" />
                <label>Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" />
                <input type="submit" value="ingresar" class="btn_login_page" />
            </form>
        </div>
    </div>
</body>
<footer style="width:100%;">
    <p style="color:white">© 2022 Colegio Lorenzo de Alcantuz</p>
    <div class="contact_footer_login_page">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-linkedin"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
    </div>
</footer>