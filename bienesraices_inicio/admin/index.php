<?php
require '../includes/app.php';
//import conection

$db = conectarDB();

estaAutenticado();

//----------------------------------------------------------------------------------
    //$auth = estaAutenticado();
    // if (!$auth) {
    //     header('location: /');
    // }
    // //write the query
    // $query = "SELECT * FROM propiedades";
    // //consult the database
    // $resultadoConsulta = mysqli_query($db,$query);
//----------------------------------------------------------------------------------
use App\Propiedad;
use App\vendedor;

//method to get properties

$propiedades = Propiedad::all();
$vendedores = Vendedor::all();


//shows the successful message 
$resultado = $_GET['resultado'] ?? null;// if doesn´t exist get so assigns null

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);//valids whether the character is a number
    if ($id) {

        $tipo =  $_POST['tipo'];
        if (validarTipoContenido($tipo)) {
            //compares what is gonna be deleted
            if ($tipo === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();  
            }elseif ($tipo === 'propiedad') {
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
        }

    }
}

//includes templates
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php $mensaje = mostrarNotificacion( intval($resultado) );//intval--becomes from string to integer
        if($mensaje) {?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
         <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde"> Nueva propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo"> Nuevo(a) vendedor</a>
        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead><!-table head--->
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-table body----  shows the results--->
                <?php foreach( $propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td>
                        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla">
                    </td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block w-100" value="Eliminar">
                        </form>

                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead><!-table head--->
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Télefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-table body----  shows the results--->
                <?php foreach( $vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre. " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block w-100" value="Eliminar">
                        </form>

                        <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    //mysqli_close($db);//close the conection
    incluirTemplate('footer');
 ?>