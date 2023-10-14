<main class="contenedor seccion">
        <h1>Agregar vendedor</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>
       <form class="formulario" method="POST" enctype="multipart/form-data"><!--enctype allows add files-->
       <?php  include __DIR__.'/formulario.php' ?>

       <input type="submit" value="Agregar vendedor" class="boton boton-verde">
       </form>
</main>