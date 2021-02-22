<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/loged', 'AuthController::loged');
$routes->get('/register', 'AuthController::register');
$routes->post('/registered', 'AuthController::registered');
$routes->get('/logout', 'AuthController::logout');

$routes->get('home', 'HomeController::index');

$routes->get('obat', 'ObatController::index');
$routes->get('obat/new', 'ObatController::new');
$routes->post('obat/create', 'ObatController::create');
$routes->get('obat/edit/(:segment)', 'ObatController::edit/$1');
$routes->post('obat/update/(:segment)', 'ObatController::update/$1');
$routes->delete('obat/delete/(:segment)', 'ObatController::delete/$1');

$routes->get('suplier', 'SuplierController::index');
$routes->get('suplier/new', 'SuplierController::new');
$routes->post('suplier/create', 'SuplierController::create');
$routes->get('suplier/edit/(:segment)', 'SuplierController::edit/$1');
$routes->put('suplier/update/(:segment)', 'SuplierController::update/$1');
$routes->delete('suplier/delete/(:segment)', 'SuplierController::delete/$1');

$routes->get('transaksi', 'TransaksiController::index');
$routes->get('transaksi/new', 'TransaksiController::new');
$routes->post('transaksi/create', 'TransaksiController::create');
$routes->delete('transaksi/delete/(:segment)', 'TransaksiController::delete/$1');

$routes->get('detil', 'DetiltransaksiController::index');
$routes->get('detil/show/(:segment)', 'DetiltransaksiController::show/$1');
$routes->get('detil/new', 'DetiltransaksiController::new');
$routes->post('detil/create', 'DetiltransaksiController::create');
$routes->get('detil/edit/(:segment)', 'DetiltransaksiController::edit/$1');
$routes->put('detil/update/(:segment)', 'DetiltransaksiController::update/$1');
$routes->delete('detil/delete/(:segment)', 'DetiltransaksiController::delete/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
