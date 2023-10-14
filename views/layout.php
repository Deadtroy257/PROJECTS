<?php 
if (!isset($_SESSION)) {//checks, whether the session has been started already otherwise will be started
    session_start();
}

$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '';//this code allows add the class 'inicio'?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo">
                    <img src="../build/img/logo.svg" alt="Logo principal">
                </a>
                <div class="mobile-menu">
                    <img src="../build/img/barras.svg" alt="Icono menú">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="../build/img/dark-mode.svg" alt="imagen dark mode">
                    <nav data-cy="navegacion-header" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contácto</a>
                        <?php if($auth)://if the session has been started shows next option?>
                            <a href="/logout">Cerrar sesiòn</a>
                        <?php endif;?>
                    </nav>
                </div>
            </div><!--.barra-->
             <?php
             echo $inicio? "<h1 data-cy='heading-sitio'>Venta de casas y departamentos exclusivos de lujo</h1>":'';
             
                ?> 

        </div>
    </header>

    <?php echo $contenido ;?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="navegacion-footer" class="navegacion">
            <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Propiedades</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contácto</a>
            </nav>
        </div>
        <p data-cy="copyright" class="copyright">
            Todos los derechos reservados <?php echo date('Y');//shows the current year?> &copyDiego
        </p>
    </footer>


    <script src="../build/js/bundle.min.js"></script>
</body>
</html>