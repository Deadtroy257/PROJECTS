<?php
//public refers $this
//static refers self::
namespace Model;

class Propiedad extends ActiveRecord{//heritage 

    protected static $tabla = 'propiedades';
    //identifies which are gonna be the columns(mapea the Propiedad object)
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {//store the information
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date("y/m/d") ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
    }
    public function validar(){
    
        if (!$this->titulo) {
            self::$errores[]  = "Debes añadir un título";
        }
        if (!$this->precio) {
            self::$errores[]  = "Debes añadir un precio";
        }
        if ( strlen($this->descripcion) < 50) {//strlen knows how many characters are stored by string
            self::$errores[]  = "Debes añadir una descripción mínimo con 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[]  = "Debes añadir el número de habitaciones";
        }
        if (!$this->wc) {
            self::$errores[]  = "Debes añadir el número de baños";
        }
        if (!$this->estacionamiento) {
            self::$errores[]  = "Debes añadir el número de estacionamientos";
        }
        if (!$this->vendedorId) {
            self::$errores[]  = "Debes elegir un vendedor";
        }
         if (!$this->imagen) {//valids that the image exists
             self::$errores[]  = "Debes agregar una imagen";
         }
   
        return self::$errores;
       }
}