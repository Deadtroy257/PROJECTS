<?php 
require 'includes/app.php';
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros">
                </picture>
            </div><!--.imagen-->

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>dolor sit amet consectetur adipisicing elit. Laboriosam laborum assumenda consectetur? Nemo commodi omnis nulla soluta distinctio suscipit exercitationem sit rem. Nihil nisi dolores vel facilis labore eaque incidunt quam rerum quod voluptas vero, libero nostrum sint aperiam, eius ullam magni odio ad ea? Iusto explicabo veniam quis praesentium?incidunt quam rerum quod voluptas vero, libero nostrum sint aperiamincidunt quam rerum quod voluptas vero, libero nostrum sint aperiam</p>
                <p>dolor sit amet consectetur adipisicing elit. Laboriosam laborum assumenda consectetur? Nemo commodi omnis nulla soluta distinctio suscipit exercitationem sit rem. Nihil nisi dolores vel facilis labore eaque incidunt quam rerum quod voluptas vero.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
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
    </section>

<?php incluirTemplate('footer');?>  