<?php

namespace Model;

class ActiveRecord{
    
    //database
    protected static $db;
    //identifies which are gonna be the columns(mapea the Propiedad object)
    protected static $columnasDB = [];

    protected static $tabla = '';

    //mistakes
    //protected-- because only will modify in the class
    //static-- because won´t be instantiated
    protected static $errores = [];

     //define database connection
     public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if (!is_null($this->id)) {
            //updating
            $this->actualizar();
        }else{
            //creating
            $this->crear();
        }
    }
    public function crear(){
        //sanitize data
        $atributos = $this->sanitizarAtributos();//call the method with row syntax
                 
        //array_keys allows get the keys
        //array_values allows get the values
        //join creates a string through an array

        //Insert into database(
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";
        $resultado = self::$db->query($query);
        
        //successful message
        if ($resultado) {
            //redirect users
            header('location: /admin?resultado=1');
        }
    }

    public function actualizar(){
        //sanitize data
        $atributos = $this->sanitizarAtributos();//call the method with row syntax
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";

            $query = "UPDATE " . static::$tabla . " SET ";
            $query .= join(', ',$valores) ;//becomes it to string
            $query .= " WHERE id = '".self::$db->escape_string($this->id)."' ";
            $query .= " LIMIT 1";

            $resultado = self::$db->query($query);

            if ($resultado) {
                //redirect users
                header('location: /admin?resultado=2');
            }
        }
    }

    //delete registration
    public function eliminar(){
        //deletes property
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    #identifies and join the database´s attributes
    public function atributos(){//iterates over columnasDB
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if($columna === 'id') continue;//id is ignored therefore is not added to attributes
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

     public function sanitizarAtributos(){//sanitizes over columnasDB
        $atributos= $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {#avoid sql inyections
            $sanitizado[$key] = self::$db->escape_string($value);//assigns the key and sanitizes the values(escapes sql syntax)

        }
        return $sanitizado;
    }

    //upload files
    public function setImagen($imagen){

        //deletes previous image
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        if ($imagen) {
            #asigns the image´s name to the attribute
            $this->imagen = $imagen;
        }
    }

    //delete file
    public function borrarImagen(){
        //veify whether file exists
        $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES.$this->imagen);//deletes file
        }
    }

   //validation
   public static function getErrores(){
       return static::$errores;
   }

   public function validar(){
    
    static::$errores = [];
 
    return static::$errores;//static goes to the attribute in child class
   }

   //shows all registrations
   public static function all(){
       $query = "SELECT * FROM " . static::$tabla;//heritages the method and look for the attribute

       $resultado = self::consultarSQL($query);

       return $resultado;
   }

   //look for a registration through id
   public static function find($id){
    $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
    $resultado = self::consultarSQL($query);
    return array_shift($resultado);//array_shift-- takes the firts element
    }

     //get a specified number of records
   public static function get($limite){
    $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";//heritages the method and look for the attribute

    $resultado = self::consultarSQL($query);

    return $resultado;
    }

   public static function consultarSQL($query){
       //consult database
       $resultado = self::$db->query($query);

       //iterate results
       $array = [];
       while(($registro = $resultado->fetch_assoc()) ){
           $array[] = static::crearObjeto($registro);
       }

       //break free the memory
       $resultado->free();

       //return results
       return $array;
   }

   protected static function crearObjeto($registro){
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists( $objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
   }

   //sincronizates the object in memory with changes done by user
   public function sincronizar( $args = []){
       foreach ($args as $key => $value) {
           if (property_exists($this, $key) && !is_null($value)) {//checks whether from object  the property exists
               $this->$key = $value;
           }
       }
   }
}