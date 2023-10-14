<?php 
require 'includes/app.php';
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <h1>Contácto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <img src="build/img/destacada3.jpg " alt="Imagen contácto">
        </picture>

        <h2>Llene el formulario de contácto</h2>

        <form class="formulario" action="">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="text" placeholder="Tu email@" id="email">

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu teléfono" pattern="[0-9]{1,15}" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                <label for="opciones">Vende o Compra:</label>

                <select name="opciones" id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Presupuesto</label>
                <input type="number" id="presupuesto" placeholder="Tu precio o Presupuesto" pattern="[0-9]">
 
            </fieldset>

            <fieldset>
                <legend>Contácto</legend>
                <p>como desea ser contactado:</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" id="contactar-telefono" value="telefono">

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" id="contactar-email" value="email">
                </div>

                <p>Si eligió teléfono, escoga la fecha y la hora en que desea ser contactado</p>

                <label for="fecha"> Fecha</label>
                <input type="date" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00">

                <input type="submit" value="Enviar" class="boton-verde">
            </fieldset>
        </form>
    </main>

<?php incluirTemplate('footer');?>