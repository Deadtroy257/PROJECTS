<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;
//array for error messages
$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //create new instance
  $vendedor = new Vendedor($_POST['vendedor']);

  //verify that empty inputs do not exist
  $errores = $vendedor->validar();

  //there aren´t issues
    if (empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header');//we create this variable to include the class 'inicio'
?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form action="/admin/vendedores/crear.php" method="POST" class="formulario" enctype="multipart/form-data"><!--enctype allows add files-->
           
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar vendedor" class="boton boton-verde">
        </form>

    </main>

<?php incluirTemplate('footer');?>