<?php

namespace Config;

use App\Controllers\Auth;
use App\Controllers\News;
use App\Controllers\Pages;
use App\Controllers\Repositori;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');

$routes->get('/login', [Auth::class, 'index'], ['filter' => 'userLoggingIn']);
$routes->post('/login/proses', [Auth::class, 'process']);
$routes->get('/logout', [Auth::class, 'logout']);


$routes->get('/repositori/download/(:segment)', [Repositori::class, 'download']);
$routes->get('/repositori/create', [Repositori::class, 'create']);
$routes->post('/repositori/save', [Repositori::class, 'save']);
$routes->get('/repositori/edit/(:segment)', [Repositori::class, 'edit']);
$routes->post('/repositori/update', [Repositori::class, 'update']);
$routes->get('/repositori/delete/(:segment)', [Repositori::class, 'delete']);
$routes->get('/repositori', [Repositori::class, 'index']);



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
