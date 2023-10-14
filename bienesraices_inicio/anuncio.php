<?php 
require 'includes/app.php';
use App\Propiedad;

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);//valid whether id received is an integer

if (!$id) {
    header('location: /');
}
$propiedad = Propiedad::find($id);
//--------------------------------
    //import database conection
    // require 'includes/app.php';
    // $db = conectarDB();
    // //consult
    // $query = "SELECT * FROM propiedades WHERE id = ${id}";
    // //get the result
    // $resultado = mysqli_query($db, $query);
    // if ($resultado->num_rows === 0) {//if id doesn´t exist , will redirect to the main page
    //     header('location: /');
    // }
    // $propiedad = mysqli_fetch_assoc($resultado);
//----------------------------
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'

?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

       
            <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen anuncio">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad->precio; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad->descripcion; ?></p>
            <p><?php echo $propiedad->descripcion; ?></p>
        </div>
    </main>

<?php
   incluirTemplate('footer');
   // mysqli_close($db); 
?>