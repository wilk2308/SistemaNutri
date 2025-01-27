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

//Agenda
$routes->get('/agenda', 'AgendaController::index');

//Pacientes
$routes->get('/pacientes', 'PacientesController::index');

//Planos
$routes->get('/planos-alimentares', 'PlanosAlimentaresController::index');

// Tela inicial paciente
$routes->get('/paciente', 'PacienteController::index');


$routes->get('/paciente/dieta', 'PacienteController::dieta');
$routes->get('/paciente/planos', 'PacienteController::planos');
$routes->get('/paciente/progresso', 'PacienteController::progresso');
$routes->get('/paciente/lembretes', 'PacienteController::lembretes');
$routes->get('/paciente/mensagens', 'PacienteController::mensagens');
$routes->get('/paciente/configuracoes', 'PacienteController::configuracoes');



