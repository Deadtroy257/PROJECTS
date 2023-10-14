<?php 
require 'includes/app.php';
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <section class="contenedor">
            <h2>Casas y Departamentos en Venta</h2>
    
            <?php 
            $limite = 10;
            include 'includes/templates/anuncios.php' 
            ?>
       </section>
    </main>

<?php incluirTemplate('footer');?>