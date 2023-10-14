<?php 
if (!isset($_SESSION)) {//checks, whether the session has been started already otherwise will be started
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css ">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '';//this code allows add the class 'inicio'?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo">
                    <img src="/build/img/logo.svg" alt="Logo principal">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menú">
                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="imagen dark mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contácto</a>
                        <?php if($auth)://if the session has been started shows next option?>
                            <a href="cerrar-sesion.php">Cerrar sesiòn</a>
                        <?php endif;?>
                    </nav>
                </div>
            </div><!--.barra-->
             <?php
             echo $inicio? "<h1>Venta de casas y departamentos exclusivos de lujo</h1>":'';
             //two ways of doing it but it's the same code
            // if($inicio){
            //     echo "<h1>Venta de casas y departamentos exclusivos de lujo</h1>";
            // }else{
            //     echo '';
            // }
                ?> 

        </div>
    </header>