<main class="contenedor seccion">
        <h1 data-cy="heading-contacto">Contácto</h1>

        <?php
        if ($mensaje):?>
            <p data-cy="alerta-envio-formulario" class='alerta exito'><?php echo $mensaje; ?></p>
        <?php endif; ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <img src="build/img/destacada3.jpg " alt="Imagen contácto">
        </picture>

        <h2 data-cy="heading-formulario">Llene el formulario de contácto</h2>

        <form data-cy="formulario-contacto" class="formulario" action="/contacto" method="POST" >
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input data-cy="input-nombre" name="contacto[nombre]" type="text" placeholder="Tu nombre" id="nombre" >

                <label for="mensaje">Mensaje</label>
                <textarea data-cy="input-mensaje" name="contacto[mensaje]" id="mensaje" ></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                <label for="opciones">Vende o Compra:</label>

                <select data-cy="input-opciones" name="contacto[tipo]" id="opciones" >
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Presupuesto</label>
                <input data-cy="input-presupuesto" name="contacto[precio]" type="number" id="presupuesto" placeholder="Tu precio o Presupuesto" pattern="[0-9]" >
 
            </fieldset>

            <fieldset>
                <legend>Contácto</legend>
                <p>como desea ser contactado:</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input data-cy="forma-contacto" name="contacto[contacto]" type="radio" id="contactar-telefono" value="telefono" >

                    <label for="contactar-email">E-mail</label>
                    <input data-cy="forma-contacto" name="contacto[contacto]" type="radio" id="contactar-email" value="email" >
                </div>

                <div id="contacto"></div>

                <input type="submit" value="Enviar" class="boton-verde">
            </fieldset>
        </form>
    </main>
