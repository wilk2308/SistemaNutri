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



$routes->get('/movimentacao', 'MovimentacaoController::index', ['as' => 'movimentacao']);

$routes->get('relatorio/download', 'RelatorioController::download');



$routes->post('/login/store', 'Login::store');
$routes->get('/logout', 'Login::destroy');

//Rotas Clientes
$routes->post('clientes/create', 'ClienteController::create');
$routes->put('clientes/edit/(:id)', 'ClienteController::edit');
$routes->delete('clientes/delete/(:id)', 'ClienteController::delete');

//Rotas Cobranças
$routes->post('cobrancas/create', 'CobrancaController::createcobranca');
$routes->put('cobrancas/edit/(:id)', 'CobrancaController::editcobranca');
$routes->delete('cobrancas/delete/(:id)', 'CobrancaController::delete');

//Rotas Movimentações
$routes->post('movimentacoes/create', 'MovimentacaoController::createcobranca');
$routes->put('movimentacoes/edit/(:id)', 'MovimentacaoController::editcobranca');
$routes->delete('movimentacoes/delete/(:id)', 'MovimentacaoController::delete');

//Rotas Subcategorias






// Rota para o método criarCobranca do controlador AsaasController
$route['asaas/criar-cobranca'] = 'AsaasController/criarCobranca';



//ROTA PADRÃO DE LOGIN E LOGOUT CODEN SHIELD
service('auth')->routes($routes);


$routes->get('api/agenda/events', 'AgendaController::events');

$routes->get('agenda', 'Agenda::index');
$routes->get('relatorio', 'Relatorio::index');
$routes->get('ferias', 'Ferias::index');

//ROTA LOGIN E LOGOUT Office365
$routes->get('auth/login', 'Auth::login');
$routes->get('auth/callback', 'Auth::callback');
$routes->get('auth/logout', 'Auth::logout');





//ROTAS FERIAS
$routes->get('/ferias', 'FeriasController::index');
$routes->post('/ferias/check', 'FeriasController::checkEligibility');
$routes->post('/ferias/submit', 'FeriasController::submit');

//ROTAS APROVAR FERIAS
$routes->get('/ferias/approveList', 'FeriasController::approveList');
$routes->post('/ferias/approve', 'FeriasController::approve');
$routes->post('/ferias/reject', 'FeriasController::reject');

//ROTA EXIBIR SOLICITAÇÃO 
$routes->get('/ferias/myRequests/(:num)', 'FeriasController::myRequests/$1');

//ROTA Sinc Users
$routes->get('/syncusers', 'SyncUsersController::index');

//CALLBACK CALENDARIO

$routes->get('/calendar/authenticate', 'CalendarController::authenticate');
$routes->get('/callback', 'CalendarController::callback');
$routes->get('/calendar/events', 'CalendarController::getCalendarEvents');

$routes->get('denuncias', 'DenunciasController::index'); // Exibe as denúncias
$routes->get('denuncias/form', 'DenunciasController::form'); // Exibe o formulário de submissão
$routes->post('denuncias/submit', 'DenunciasController::submit'); // Envia o formulário
$routes->get('denuncias/agradecimento', 'DenunciasController::agradecimento'); // Página de agradecimento após o envio


// ROTAS users
$routes->get('users', 'UsersController::index');
$routes->post('users/buscar', 'UsersController::buscar');
$routes->get('users/create', 'UsersController::create');
$routes->post('users/store', 'UsersController::store');
$routes->get('users/edit/(:num)', 'UsersController::edit/$1');
$routes->post('users/update/(:num)', 'UsersController::update/$1');
$routes->get('users/delete/(:num)', 'UsersController::delete/$1');

// Rotas Noticias
$routes->get('noticias', 'NoticiasController::index'); // Exibe a lista de notícias
$routes->get('noticias/cadastrar', 'NoticiasController::formulario'); // Exibe o formulário
$routes->post('noticias/salvar', 'NoticiasController::salvar'); // Salva os dados no banco






$routes->post('event/addEvent', 'EventController::addEvent');

// Routers Financeiro
$routes->get('/financeiro', 'FinanceiroController::index');

// Rotas Financeiro Cadastrar avisos
$routes->get('/financeiro/cadastrar', 'FinanceiroController::cadastrar');
$routes->post('/financeiro/salvarAviso', 'FinanceiroController::salvarAviso');

// Rotas dashboard okr
//$routes->get('/dashboard', 'Dashboard::index');

// Rotas METAS
//$routes->get('/metas', 'MetaController::index');
//$routes->get('/metas/create', 'MetaController::create');
//$routes->post('/metas/store', 'MetaController::store');
//$routes->get('/metas/edit/(:num)', 'MetaController::edit/$1');
//$routes->post('/metas/update/(:num)', 'MetaController::update/$1');

//$routes->resource('metas'); // Usará as rotas padrões do CodeIgniter 4 para o controller RESTful


// ROTA OKR Banco de dados
$routes->get('dashboard', 'DashboardController::index');
$routes->get('dashboard/metas/(:segment)', 'DashboardController::getMetas/$1');
$routes->get('dashboard/metas', 'DashboardController::getMetas');
$routes->put('/dashboard/metas/(:num)', 'DashboardController::updateMeta/$1');


// ROTA Media Conclusão
$routes->get('/dashboard/media', 'DashboardController::getMediaConclusao');


// ROTA Trimestre
$routes->get('/test/cards/ano/(:num)/trimestre/(:num)', 'DashboardController::getCardsPorTrimestre/$1/$2');


// ROTA Fornecedores
$routes->get('fornecedores', 'Fornecedores::index');

//ROTAS editar e excluir fornecedores
$routes->get('fornecedores/edit/(:num)', 'Fornecedores::edit/$1'); // Rota para edição
$routes->post('fornecedores/delete/(:num)', 'Fornecedores::delete/$1'); // Rota para apagar

// ROTAS novo forncedor 
$routes->get('fornecedores/create', 'Fornecedores::create'); // Exibe o formulário de criação
$routes->post('fornecedores/store', 'Fornecedores::store'); // Processa o envio do formulário

// ROTAS KEYRESULTS
$routes->get('/dashboard/metas/(:segment)', 'DashboardController::getMetas/$1');
$routes->put('/dashboard/metas/(:num)', 'DashboardController::updateMeta/$1');
$routes->put('/dashboard/keyresult/(:num)', 'DashboardController::updateKeyResult/$1');



$routes->get('dashboard/metas/(:num)', 'MetaController::show/$1');

//ROTAS UPDATES KEYRESULTS
$routes->put('/dashboard/metas/key-results/(:num)', 'DashboardController::updateKeyResults/$1');


//Contratos
$routes->get('contratos', 'Contratos::index');
$routes->get('contratos/criar', 'Contratos::criar');
$routes->post('contratos/salvar', 'Contratos::criar');



//ROTAS GRUPOS
$routes->group('user', function ($routes) {
    $routes->get('add-to-group', 'UserController::addUserToGroup');
    $routes->get('check-group', 'UserController::checkUserGroup');
    $routes->get('remove-from-group', 'UserController::removeUserFromGroup');
    $routes->get('list-user-groups', 'UserController::listUserGroups');
    $routes->get('list-all-groups', 'UserController::listAllGroups');
});


// grupos views
$routes->get('users/groups', 'UsersController::listAllGroups'); // Lista todos os grupos
$routes->get('users/groups/(:num)', 'UsersController::listUserGroups/$1'); // Lista grupos de um usuário


//listar grupo
$routes->get('grupos', 'UsersController::listGroups'); // Ajuste se usar GroupsController
// editar grupos e excluir
$routes->get('grupos/editar/(:num)', 'UsersController::editGroup/$1');
$routes->post('grupos/editar/(:num)', 'UsersController::updateGroup/$1');
$routes->get('grupos/excluir/(:num)', 'UsersController::deleteGroup/$1');

// criar grupo 
$routes->get('grupos/novo', 'UsersController::createGroup');
$routes->post('grupos/novo', 'UsersController::storeGroup');

// novo usuario
$routes->get('usuarios/novo', 'UsersController::create');
$routes->post('usuarios/novo', 'UsersController::store');
// editar usuario
$routes->get('usuarios/editar/(:num)', 'UsersController::edit/$1');
$routes->post('usuarios/editar/(:num)', 'UsersController::update/$1');

// deletar usuario
$routes->get('usuarios/excluir/(:num)', 'UsersController::delete/$1');

// ROTAS FILTRO GRUPOS MODELOS
$routes->get('admin', 'AdminController::index', ['filter' => 'group:admin']);
$routes->get('financeiro', 'FinanceiroController::index', ['filter' => 'group:financeiro']);
$routes->get('tecnologia', 'TechController::index', ['filter' => 'group:tecnologia']);


$routes->get('financeiro', 'FinanceiroController::index', ['filter' => 'session']);

// Dashboard graficos
$routes->get('dashboard/media-conclusao', 'DashboardController::getMediaConclusao');

// ROTAS Inventario (Anterior com os dados errados)
$routes->group('items', function($routes) {
    $routes->get('/', 'ItemsController::index'); // Listar todos os itens
    $routes->get('create', 'ItemsController::create'); // Formulário de cadastro
    $routes->post('store', 'ItemsController::store'); // Salvar item no banco
    $routes->get('edit/(:num)', 'ItemsController::edit/$1'); // Formulário de edição
    $routes->post('update/(:num)', 'ItemsController::update/$1'); // Atualizar item
    $routes->get('delete/(:num)', 'ItemsController::delete/$1'); // Excluir item
});


$routes->group('locations', function($routes) {
    $routes->get('/', 'LocationsController::index'); // Listar todas as localizações
    $routes->get('create', 'LocationsController::create'); // Formulário de cadastro
    $routes->post('store', 'LocationsController::store'); // Salvar localização no banco
    $routes->get('edit/(:num)', 'LocationsController::edit/$1'); // Formulário de edição
    $routes->post('update/(:num)', 'LocationsController::update/$1'); // Atualizar localização
    $routes->get('delete/(:num)', 'LocationsController::delete/$1'); // Excluir localização
});


$routes->group('maintenance', function($routes) {
    $routes->get('/', 'MaintenanceController::index'); // Listar manutenções
    $routes->get('create', 'MaintenanceController::create'); // Formulário de cadastro
    $routes->post('store', 'MaintenanceController::store'); // Salvar manutenção
    $routes->get('edit/(:num)', 'MaintenanceController::edit/$1'); // Formulário de edição
    $routes->post('update/(:num)', 'MaintenanceController::update/$1'); // Atualizar manutenção
    $routes->get('delete/(:num)', 'MaintenanceController::delete/$1'); // Excluir manutenção
});




//ROTAS Importar inventario 
$routes->post('/import/csv', 'ImportController::importCsv');
$routes->get('/import', 'ImportController::index'); // Página para upload

// Cod de barras 
$routes->get('/validate-barcode', 'ValidationController::scannerPage'); // Página de escaneamento
$routes->get('/validate-patrimonio/(:any)', 'ValidationController::validatePatrimonio/$1');
 // Validação do patrimônio

// Sistema Inventario Atual
$routes->group('inventario', function($routes) {
    $routes->get('/', 'AssetController::index'); // Listar todos os itens
    $routes->get('create', 'AssetController::create'); // Formulário para criar
    $routes->post('store', 'AssetController::store'); // Salvar no banco
    $routes->get('edit/(:num)', 'AssetController::edit/$1'); // Formulário para editar
    $routes->post('update/(:num)', 'AssetController::update/$1'); // Atualizar no banco
    $routes->get('delete/(:num)', 'AssetController::delete/$1'); // Excluir do banco
    $routes->post('import', 'AssetController::importCsv'); // Importar CSV
});

$routes->post('/update-checked-items', 'ValidationController::updateCheckedItems');

$routes->post('/inventario/toggle-check/(:num)', 'AssetController::toggleCheck/$1');




