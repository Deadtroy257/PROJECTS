<?php

namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    //identifies which are gonna be the columns(mapea the Propiedad object)
    protected static $columnasDB = ['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {//store the information
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    public function validar(){
    
        if (!$this->nombre) {
            self::$errores[]  = "El nombre es obligatorio";
        }
        if (!$this->apellido) {
            self::$errores[]  = "El apellido es obligatorio";
        }
        if (!$this->telefono) {
            self::$errores[]  = "El teléfono es obligatorio";
        }

        if (!empty($this->telefono)) {
            if (!preg_match('/[0-9]{10}/', $this->telefono )) {//regular expression checks the input's value
                self::$errores[]  = "Ingrese un teléfono válido";
            }
        }

        return self::$errores;
    }
}