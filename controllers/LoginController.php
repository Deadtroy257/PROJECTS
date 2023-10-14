<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(Router $router){
        $errores = [];

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $auth = new Admin($_POST);//creates a new instance with post content

            $errores = $auth->validar();

            if (empty($errores)) {
                //verify whether the user exists
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    //incorrect user (error message)
                    $errores = Admin::getErrores();
                }else{
                    //verify whether the password exists
                    $autenticado = $auth->comprobarPassword($resultado);

                        if ($autenticado) {
                            //authenticate the user
                            $auth->autenticar();
                        }else{
                            //incorrect password (error message)
                            $errores = Admin::getErrores();
                        }
                }
            }
        }

        $router->render('auth/login',[
           'errores' => $errores 
        ]);
    }
    public static function logout(){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

}