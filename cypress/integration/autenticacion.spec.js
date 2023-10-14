/// <reference types="cypress" />

describe('prueba la autenticación', () => {
    it('prueba la autenticación en/login', () => {
        cy.visit('/login');
        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').should('have.text', 'Iniciar sesión');

        cy.get('[data-cy="formulario-login"]').should('exist');

        //both inputs are obligatory
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should('exist');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.class', 'error');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.text', 'El correo es obligatorio');

        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class', 'error');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text', 'La contraseña es obligatoria');
        //verify whether the user exists
        //verify whether the password to be correct 
    }); 
});