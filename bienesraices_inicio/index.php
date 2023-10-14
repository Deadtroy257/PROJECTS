<?php 
require 'includes/app.php';
//the function is called
incluirTemplate('header', $inicio = true);//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p> Dolores quae dicta libero eum molestias cum quaerat facilis quam consectetur temporibus beatae quidem ipsum accusantium rerum blanditiis, in dolorem fuga? Ipsum!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p> Dolores quae dicta libero eum molestias cum quaerat facilis quam consectetur temporibus beatae quidem ipsum accusantium rerum blanditiis, in dolorem fuga? Ipsum!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p> Dolores quae dicta libero eum molestias cum quaerat facilis quam consectetur temporibus beatae quidem ipsum accusantium rerum blanditiis, in dolorem fuga? Ipsum!</p>
            </div>
        </div>
    </main>

    <section class="contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <?php 
            include 'includes/templates/anuncios.php' 
        ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde"> Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tu s sueños</h2>
        <p>Llena el formulario y nos contactaremos contigo</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="imagen blog">
                    </picture>
                </div><!--imagen-->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>14/11/2021</span> por: <span>Admin</span></p>

                        <p>Concejos para construir una trrraza en el techo desu casacon los mejores materiales a un bajo costo</p>
                    </a>
                </div><!--.texto-entrada-->

            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="imagen blog">
                    </picture>
                </div><!--imagen-->
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Cuía para la decoración de tu hogar</h4>
                        <p>Escrito el: <span>14/11/2021</span> por: <span>Admin</span></p>

                        <p>Maximisa el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div><!--.texto-entrada-->

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple mis expectativas.
                </blockquote>
                <p>- Diego Castro</p>
            </div>
        </section>
    </div>

    <?php incluirTemplate('footer');?>