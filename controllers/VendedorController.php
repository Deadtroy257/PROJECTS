<?php
namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class vendedorController{
    public static function crear(Router $router){
        $vendedor = new Vendedor;

        $errores =  Vendedor::getErrores();

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

          $router->render('vendedores/crear',[
              'vendedor' => $vendedor,
              'errores' => $errores
          ]);
    }

    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

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

        $router->render('vendedores/actualizar',[
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);

    }

    public static function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);//valids whether the character is a number
            if ($id) {
        
                $tipo =  $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
        
            }
        }
    }
}