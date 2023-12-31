<?php 
require 'includes/app.php';
//the function is called
incluirTemplate('header');//we create this variable to include the class 'inicio'
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>
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
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="imagen blog">
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
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="imagen blog">
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
    </main>

<?php incluirTemplate('footer');?>