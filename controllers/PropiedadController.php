<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        
        //shows the successful message 
        $resultado = $_GET['resultado'] ?? null;// if doesn´t exist get so assigns null


        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        //array for error messages
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            /* create a new instance */
            $propiedad = new Propiedad($_POST['propiedad']);

            //file upload
            #create file
            $carpetaImagenes = '/imagenes/';//route to file

            if(!is_dir($carpetaImagenes)) {//is_dir looks for if the file exists
                mkdir($carpetaImagenes);//mkdir creates the file
            }

            //generate a unic name
            #md5-- changes the image´s name 
            #uniqid-- asigns a unic name per file
            #rand-- improves the image name
            $nombreImagen = md5( uniqid(rand(), true)).".jpg";
            /*set the image */
            //upload image with intervention image
            if ($_FILES['propiedad']['tmp_name']['imagen']) {

                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//fit is an effect
                $propiedad->setImagen($nombreImagen);
            }

            //validate
            $errores = $propiedad->validar();

                //checks the array be empty
            if (empty($errores)) {
                //create file to upload images  
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //save the image in the server
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                //save in database
                $propiedad->guardar();

            }
        }

        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    //POST method to update
    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);

        $errores = Propiedad::getErrores();

        $vendedores = Vendedor::all();

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
        
        $router->render('propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores'=> $errores,
            'vendedores' => $vendedores
        ]);

    }

    public static function eliminar(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);//valids whether the character is a number
            if ($id) {
        
                $tipo =  $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
        
            }
        }
    }
}