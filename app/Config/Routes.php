<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('ClienteController');
$routes->setDefaultController('CobrancaController');
$routes->setDefaultController('MovimentacaoController');
$routes->setDefaultController('SubcategoriaController');
$routes->setDefaultController('AsaasController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);



 /*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
$routes->get('/login', 'Login::index',  ['as' => 'login']);
$routes->get('/', 'Home::index', ['as' => 'home']);


$routes->post('/login/store', 'Login::store');
$routes->get('/logout', 'Login::destroy');

//ROTA PADRÃO DE LOGIN E LOGOUT CODEN SHIELD
service('auth')->routes($routes);


