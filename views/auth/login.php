<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="heading-login">Iniciar sesión</h1>
        <?php foreach($errores as $error): //it´s executed while the array has content?>
            <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>

        <?php endforeach; ?>
        <form data-cy="formulario-login" method="POST" class="formulario" action="/login">
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