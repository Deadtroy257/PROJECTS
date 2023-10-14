<?php
use App\Vendedor;
require '../../includes/app.php';
estaAutenticado();

//verifies whether ID is valid
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('location: /admin');
}

//get the seller´s array
$vendedor = Vendedor::find($id);

//array for error messages
$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //asign values
    $args = $_POST['vendedor'];
        
    //sync the object in memory
    $vendedor->sincronizar($args); 
    
    //validation
    $errores = $vendedor->validar();
    if (empty($errores)) {
        $vendedor->guardar();
    }
  
}

incluirTemplate('header');//we create this variable to include the class 'inicio'
?>

<main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" enctype="multipart/form-data"><!--enctype allows add files-->
           
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Guardar cambios" class="boton boton-verde">
        </form>

    </main>

<?php incluirTemplate('footer');?>