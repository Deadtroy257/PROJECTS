<?php
namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url,$fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url,$fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;

        //array of routes protected
        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];
        
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET') {
           $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //protect the routes
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /public');
        }
        
        if ($fn) {
            //URL exists and there is a function associated
            call_user_func($fn, $this);// call a function whe don´t know how is her name
        }else{
            echo ' pagina no encontrada';
        }
    }

    //shows a view
    public function render($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start();//stores files in memory

        include __DIR__."/views/$view.php";

        $contenido = ob_get_clean();//cleans the memory

        include __DIR__."/views/layout.php";
    }
}