<?php 
require 'includes/app.php';
$db = conectarDB();

$errores= [];
//valid user
if ($_SERVER['REQUEST_METHOD']=== 'POST') {//reads all gotten by method post
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));//valid whether email has an @ and also avoid sql syntax
    $password = mysqli_real_escape_string($db,$_POST['password']);


    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[] = "La contraseña es obligatoria";
    }
    if (empty($errores)) {
        //verify if user has been created
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        if ( $resultado->num_rows ) {//checks if there are results gotten
            # verify whether the password is correct
            $usuario = mysqli_fetch_assoc($resultado);
            
            # verify whether password is correct
            $auth = password_verify($password,$usuario['password']);
            
            if ($auth) {
                //verify user
                session_start();

                //fill session array
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /admin');
            }else{
                $errores[] = "La cotraseña es incorrecta";
            }
        }else{
            $errores[] = "El usuario no existe";
        }
    }
}


//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar sección</h1>
        <?php foreach($errores as $error): //it´s executed while the array has content?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>
        <form method="POST" class="formulario">
        <fieldset>
                <legend>Email y contraseña</legend>

                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="Tu email@" id="email">

                <label for="contraseña">Contraseña</label>
                <input type="password" name="password" placeholder="Tu Contraseña" id="contraseña">
            </fieldset>

            <input type="submit" value="Iniciar sección" class="boton boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer');?>