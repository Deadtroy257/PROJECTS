<?php
//import the connection
require 'includes/app.php';
$db = conectarDB();

//create an email and password
$email = "diego@correo.com";
$password = "123456";

// can be use PASSWORD_BCRYPT or PASSWORD_DEFAULT
$passwordHash = password_hash($password, PASSWORD_BCRYPT);//generetes a password hash
//every hash password has a 60 extension
//var_dump($passwordHash);
//query to create user
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}');";
//echo $query;

//add it to database
mysqli_query($db, $query);

?>