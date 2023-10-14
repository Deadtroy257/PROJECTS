/// <reference types="cypress" />
describe('carga la página principal', () => {
    it('prueba el header de la página principal', () => {
        cy.visit('/');
        //document.querySelector('h1').textContent(js sintax)
        //cy.get('h1')//(cypress sintax)
        //Recommended selector
        cy.get('[data-cy="heading-sitio"]').should('exist');//veries whether exitst the element
        //call the text and validate while it is equal
        //invoke('text)-- reads the content
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de casas y departamentos exclusivos de lujo');
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes raices');
    })

    it('prueba el bloque de los iconos principales', () => {
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        //have.prop-- verifies whether exists the property
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

        //select icons
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        //find-- allows select classes
        //have-length validates how many elements exists
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3)
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('not.have.length', 4)
    })

    it('prueba la sección de propiedades', () => {
        //should have 3 properties
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 5);

        //proof the properties link
        //verifies whether exists a class
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').should('not.have.class', 'boton-amarillo');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equal', 'Ver propiedad');

        //proof the one property link
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        //cy.wait(1000);
        cy.go('back');//go back towards the main page
    })

    it('prueba el routing hacia todas las propiedades', () => {
        cy.get('[data-cy="ver-propiedades"]').should('exist');
        cy.get('[data-cy="ver-propiedades"]').should('have.class','boton-verde');
        //attr-- verifies the attributes in this case the link
        cy.get('[data-cy="ver-propiedades"]').invoke('attr', 'href').should('equal', '/public/propiedades');

        cy.get('[data-cy="ver-propiedades"]').click();
        cy.get('[data_cy="heading-propiedades"]').invoke('text').should('equal', 'Casas y Departamentos en Venta');

        //cy.wait(1000);
        cy.go('back');
    })

    it('prueba el bloque de contácto', () => {
        cy.get('[data-cy="imagen-contacto"]').should('exist');
        cy.get('[data-cy="imagen-contacto"]').find('h2').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
        cy.get('[data-cy="imagen-contacto"]').find('p').invoke('text').should('equal', 'Llena el formulario y nos contactaremos contigo');
        cy.get('[data-cy="imagen-contacto"]').find('a').should('have.class', 'boton-amarillo');
        // cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href')
        //     .then( href => {
        //         cy.visit(href)
        //     });
        cy.get('[data-cy="imagen-contacto"]').find('a').invoke('attr', 'href').should('equal', '/public/contacto');
        cy.get('[data-cy="enlace-contacto"]').click();
        cy.get('[data-cy="heading-contacto"]').should('exist');
        //cy.wait(1000);
        cy.go('back');
    })

    it('prueba los testimoniales y el blog', () => {
        cy.get('[data-cy="blog"]').should('exist');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('equal', 'Nuestro Blog');
        cy.get('[data-cy="blog"]').find('h3').invoke('text').should('not.equal', 'Blog');
        cy.get('[data-cy="blog"]').find('img').should('have.length', 2);

        cy.get('[data-cy="testimoniales"]').should('exist');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('equal', 'Testimoniales');
        cy.get('[data-cy="testimoniales"]').find('h3').invoke('text').should('not.equal', 'Nuestros Testimoniales');

    })
});