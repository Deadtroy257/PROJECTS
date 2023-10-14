<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices', 3307);
    if(!$db){
        echo 'Error';
        exit;//finishes the code
    }

    return $db;
}