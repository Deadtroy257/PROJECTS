<?php
require 'funciones.php';
require 'config/database.php';
require  __DIR__.'/../vendor/autoload.php';

//database connection
$db = conectarDB();

use Model\ActiveRecord;

//$propiedad = new Propiedad;
ActiveRecord::setDB($db);

