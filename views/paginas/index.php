
    <main class="contenedor seccion">
        <h2 data-cy="heading-nosotros" >Mas sobre nosotros</h2>
        <?php include 'iconos.php' ?>
    </main>

    <section class="contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <?php 
            include 'listado.php' 
        ?>
        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde" data-cy="ver-propiedades">Ver todas</a>
        </div>
    </section>

    <section data-cy="imagen-contacto" class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario y nos contactaremos contigo</p>
        <a data-cy="enlace-contacto" href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section data-cy="blog" class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="../build/img/blog1.webp" type="image/webp">
                        <source srcset="../build/img/blog1.jpg" type="image/jpeg">
                        <img src="../build/img/blog1.jpg" alt="imagen blog">
                    </picture>
                </div><!--imagen-->
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>14/11/2021</span> por: <span>Admin</span></p>

                        <p>Concejos para construir una trrraza en el techo desu casacon los mejores materiales a un bajo costo</p>
                    </a>
                </div><!--.texto-entrada-->

            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="../build/img/blog2.webp" type="image/webp">
                        <source srcset="../build/img/blog2.jpg" type="image/jpeg">
                        <img src="../build/img/blog2.jpg" alt="imagen blog">
                    </picture>
                </div><!--imagen-->
                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Cuía para la decoración de tu hogar</h4>
                        <p>Escrito el: <span>14/11/2021</span> por: <span>Admin</span></p>

                        <p>Maximisa el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                    </a>
                </div><!--.texto-entrada-->

            </article>
        </section>

        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple mis expectativas.
                </blockquote>
                <p>- Diego Castro</p>
            </div>
        </section>
    </div>

