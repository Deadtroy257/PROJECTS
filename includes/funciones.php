<?php
//we define the url for includes, they´re defined with simple quotes but need to be called without quotes
define('TEMPLATES_URL',__DIR__. '/templates');//__DIR__ brings us the complete location of the files
define('FUNCIONES_URL',__DIR__. 'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'].'/imagenes/');


//function created to include files, giving the variable
function incluirTemplate(string $nombre, bool $inicio = false){
    include TEMPLATES_URL."/${nombre}.php";//always needs double quotes
}
//function to validate users, created in order to don´t duplicate code
function estaAutenticado() : bool{
    session_start();

    if (!$_SESSION['login']) {
        header('location: /');
    }
    return false;
    
}

//debug function
function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
exit;
}

//escape / sanitaze the HTML
function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}

//verify kind of content
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);//in_array looks for a value inside an array
}

//shows messages
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar($url){
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);//filter checks wheter $id is a number
    //var_dump($id);

    if (!$id) {
        header("location: $url");
    }
    return $id;
}