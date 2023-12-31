<?php
require_once __DIR__.'/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\vendedorController;
use Controllers\PaginasController;

$router = new Router();

//PRIVATE ZONE
$router->get('/admin', [PropiedadController::class, 'index']);//looks for inside the controller the index method
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [vendedorController::class, 'crear']);
$router->post('/vendedores/crear', [vendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [vendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [vendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [vendedorController::class, 'eliminar']);

//PUBLIC ZONE
$router->get('/',[PaginasController::class, 'index']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/propiedades',[PaginasController::class, 'propiedades']);
$router->get('/propiedad',[PaginasController::class, 'propiedad']);
$router->get('/blog',[PaginasController::class, 'blog']);
$router->get('/entrada',[PaginasController::class, 'entrada']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->post('/contacto',[PaginasController::class, 'contacto']);

//LOGIN AND AUTHENTICATION
$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);


$router->comprobarRutas();