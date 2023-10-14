/// <reference types="cypress" />
describe('prueba el formulario de contacto', () => {
    it('prueba la página de contáctoy el envio de email', () => {
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contácto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario Contácto');

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el formulario de contácto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Llena el Formulario');

        cy.get('[data-cy="formulario-contacto"]').should('exist');

    });

    it('llena los campos del formulario', () => {
        //type-- writes in the input
        cy.get('[data-cy="input-nombre"]').type('Diego');
        cy.get('[data-cy="input-mensaje"]').type('Hola estoy interesado en comprar una casa');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-presupuesto"]').type('100_000_000');
        //eq-- select the element
        //check-- select the radio button
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type('3163453692');
        cy.get('[data-cy="input-fecha"]').type('2021-12-16');
        cy.get('[data-cy="input-hora"]').type('10:30');

        cy.wait(3000);

        cy.get('[data-cy="forma-contacto"]').eq(1).check();
        cy.get('[data-cy="input-email"]').type('diego@correo.com');

        //submit-- sends the form
        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje enviado correctamente');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class', 'exito').and('not.have.class', 'error');

    });
});