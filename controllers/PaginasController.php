<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
      
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router){
        $id = validarORedireccionar('/propiedades');

        //look for the property by her id
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //create a new PHPmailer instance
            $mail = new PHPMailer();

            //set up SMTP
            $mail->isSMTP();//newinance
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;//validates authentication
            $mail->SMTPSecure = 'tls';//sends secures emails
            $mail->Port = 2525;
            $mail->Username = '4292ec0d7bea2a';
            $mail->Password = '440b37e0a7f761';

            //set up the mail content
            $mail->setFrom('admin@bienesraices.com');//who sends the email
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');//who receives the email
            $mail->Subject = 'Tienes un nuevo mensaje';

            //enable the HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //define the content
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre']. '</p>';

            //conditionally send some email or phone fields
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por Teléfono</p>';
                $contenido .= '<p>Teléfono: '. $respuestas['telefono']. '</p>';
                $contenido .= '<p>Fecha: '. $respuestas['fecha']. '</p>';
                $contenido .= '<p>Hora: '. $respuestas['hora']. '</p>';
            }else{
                $contenido .= '<p>Eligió ser contactado por Email</p>';
                $contenido .= '<p>Email: '. $respuestas['email']. '</p>';
            }
            $contenido .= '<p>Mensaje: '. $respuestas['mensaje']. '</p>';
            $contenido .= '<p>Vende o Compra: '. $respuestas['tipo']. '</p>';
            $contenido .= '<p>Precio o Presupuesto: $'. $respuestas['precio']. '</p>';
            $contenido .= '<p>Prefiere ser contactado por: '. $respuestas['contacto']. '</p>';
            $contenido .= '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = 'texto alternativo sin html';

            //send the email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            }else{
                $mensaje = "El mensaje no se pudo enviar";
            }


        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje

        ]);
    }
    
}