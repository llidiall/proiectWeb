<?php

namespace Config;

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
$routes->get('/', 'WelcomeController::index');
$routes->get('/index', 'WelcomeController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/check', 'LoginController::check');
$routes->get('/afterlogin', 'LoginController::afterlogin');
$routes->get('/logout', 'LoginController::logout');
$routes->get('/upload', 'WelcomeController::upload');
$routes->get('/welcome_message', 'WelcomeController::index');
$routes->get('/products', 'ProductsController::index');
$routes->get('/about', 'AboutController::index');
$routes->get('/contact', 'ContactController::index');
$routes->get('/signup', 'SignupController::index');


$routes->get('/dresses', 'ImageController::index');
$routes->get('/upload', 'ImageController::upload');
$routes->post('/save', 'ImageController::save');
$routes->get('/edit/(:num)', 'ImageController::edit/$1');
$routes->post('/update/', 'ImageController::update');
$routes->get('/delete/(:num)', 'ImageController::delete/$1');

//$routes->post('/signup/store', 'SignupController::store');

$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
//$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
//$routes->post('/check', 'SigninController::check');


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
