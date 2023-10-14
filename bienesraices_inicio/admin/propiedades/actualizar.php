<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';

estaAutenticado();

$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);//filter checks wheter $id is a number
//var_dump($id);

if (!$id) {
    header('location: /admin');
}

//query to get the properties
$propiedad = Propiedad::find($id);
//----------------------------------------------------------------------------------
    // $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    // $resultado = mysqli_query($db,$consulta);
    // $propiedad = mysqli_fetch_assoc($resultado);
    // echo "<pre>";
    // var_dump($propiedad);
    // echo "</pre>";
    //query to get the sellers
    // $consulta = "SELECT * FROM vendedores";
    // $resultado = mysqli_query($db, $consulta);
//----------------------------------------------------------------------------------
//query to get the sellers
$vendedores = Vendedor::all();

//array for error mesages
$errores = Propiedad::getErrores();
//-------------------------------------------------------------------------------------------------------------
    // $titulo = $propiedad['titulo'];
    // $precio = $propiedad['precio'];
    // $descripcion = $propiedad['descripcion'];
    // $habitaciones = $propiedad['habitaciones'];
    // $wc = $propiedad['wc'];
    // $estacionamiento =$propiedad['estacionamiento'];
    // $vendedorId = $propiedad['vendedorId'];
    // $imagenPropiedad = $propiedad['imagen'];
//-------------------------------------------------------------------------------------------------------------
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    //asign atributes
    $args = $_POST['propiedad'];
    

    $propiedad->sincronizar($args);

    //validation
    $errores = $propiedad->validar();

    //upload files
    //generate a unic name
    #md5-- changes the image name 
    #uniqid-- asigns a unic name per file
    #rand-- improves the image name
    $nombreImagen = md5( uniqid(rand(), true)).".jpg";
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//fit is an effect
        $propiedad->setImagen($nombreImagen);
    }

    //checks the array be empty
    if (empty($errores)) {

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        //update image
        $image->save(CARPETA_IMAGENES.$nombreImagen);
    }
        $propiedad->guardar();
    }
    
}   
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" enctype="multipart/form-data"><!--enctype allows add files-->
           <?php include '../../includes/templates/formulario_propiedades.php' ?>

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>

    </main>

<?php incluirTemplate('footer');?>