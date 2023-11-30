<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/usuario/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

//Funciones del cliente
$routes->get('/inicios/inicioCliente', 'Cliente::inicio');
$routes->get('/cliente/mostrar', 'Cliente::mostrar');
$routes->get('/cliente/coberturas', 'Cliente::coberturas');
$routes->get('/cliente/seguro', 'Cliente::seguro');
$routes->get('/cliente/comprar', 'Cliente::comprar');
$routes->post('/cliente/insertarCompra', 'Cliente::insertarCompra');

//Funciones del administrador 
//datos del cliente
$routes->get('/inicios/inicioAdmin', 'Admin::inicio');
$routes->get('/admin/mostrar', 'Admin::mostrar');
$routes->get('/admin/editar/(:num)', 'Admin::editar/$1');
$routes->get('/admin/delete/(:num)', 'Admin::delete/$1');
$routes->get('/admin/buscar', 'Admin::buscar');
$routes->get('/admin/agregar', 'Admin::agregar');
$routes->post('/admin/insert', 'Admin::insert');
$routes->post('/admin/update', 'Admin::update');
//datos de las coberturas
$routes->get('/admin/mostrarCoberturas', 'Admin::mostrarCoberturas');
$routes->get('/admin/editarCobertura/(:num)', 'Admin::editarCobertura/$1');
$routes->get('/admin/deleteCobertura/(:num)', 'Admin::deleteCobertura/$1');
$routes->get('/admin/buscarCobertura', 'Admin::buscarCobertura');
$routes->get('/admin/agregarCobertura', 'Admin::agregarCobertura');
$routes->post('/admin/insertCobertura', 'Admin::insertCobertura');
$routes->post('/admin/updateCobertura', 'Admin::updateCobertura');
$routes->get('/admin/estadisticas', 'Admin::estadisticas');


