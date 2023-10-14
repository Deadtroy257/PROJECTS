<?php 
require '../../includes/app.php';


use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

//Database
estaAutenticado();

//$db = conectarDB();

$propiedad = new Propiedad;

//query to get the sellers
$vendedores = Vendedor::all();

// $consulta = "SELECT * FROM vendedores";
// $resultado = mysqli_query($db, $consulta);
//array for error messages
$errores = Propiedad::getErrores();


if($_SERVER['REQUEST_METHOD'] === 'POST') {

   
    
}   
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form action="/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data"><!--enctype allows add files-->
           
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>

    </main>

<?php incluirTemplate('footer');?>