document.addEventListener('DOMContentLoaded', function(){

    evenListeners();
    darkMode();
});
function darkMode(){
    const prefiereDarkeMode = window.matchMedia('(prefers-color-scheme: dark)');//reads the browser´s  preferences
    //console.log(prefiereDarkeMode.matches);

    if(prefiereDarkeMode.matches){//chagens the theme deppending on  browser´s preferences
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    };

    prefiereDarkeMode.addEventListener('change', function () {//if the browser´s theme is changed, the webpage theme is also changed
        if(prefiereDarkeMode.matches){//chagens the theme deppending on  browser´s preferences
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        };
    });
    
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}
function evenListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    //shows conditional camps
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto) );
}

function navegacionResponsive(){
     const navegacion = document.querySelector('.navegacion');
    // if(navegacion.classList.contains('mostrar')){//large code
    //     navegacion.classList.remove('mostrar');
    // }else{
    //     navegacion.classList.add('mostrar');
    // }
    navegacion.classList.toggle('mostrar');//we can use this tool to add or remove the class
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Número de Teléfono</label>
            <input data-cy="input-telefono" name="contacto[telefono]" type="tel" placeholder="Tu teléfono" pattern="[0-9]{1,15}" id="telefono" >

            <p>Elija la fecha y la hora en la que desea recibir la llamada</p>

            <label for="fecha"> Fecha</label>
            <input data-cy="input-fecha" name="contacto[fecha]" type="date" id="fecha">

            <label for="hora">Hora</label>
            <input data-cy="input-hora" name="contacto[hora]" type="time" id="hora" min="09:00" max="18:00">
        `;
    }else{
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input data-cy="input-email" name="contacto[email]" type="text" placeholder="Tu email@" id="email" >

        `;
    }    
}
