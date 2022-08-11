<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/logout', 'Authentification::logout');
$routes->add('/login', 'Authentification::login');
$routes->add('/loginAsGuest', 'Authentification::loginAsGuest');

$routes->add('/register', 'Authentification::register');
$routes->add('/forgotPassword', 'Authentification::forgotPassword');
$routes->add('/resetPassword/(:any)/(:any)', 'Authentification::resetPassword/$1/$2');
$routes->add('/activation/(:any)/(:any)', 'Authentification::activateAccount/$1/$2');

 $routes->add('/loginas_back/(:any)', 'UserPanel::loginas_back/$1');
$routes->get('/loginas_back/(:any)', 'UserPanel::loginas_back/$1');

 $routes->add('/ajax/(:any)', 'Ajax::index/$1');

$routes->group("admin", ["filter" => "auth:A"], function ($routes) {
	$routes->add('dashboard', 'AdminPanel::index');
	$routes->add('profile', 'AdminPanel::profile');
	$routes->add('speciality/update', 'Speciality::update');
	$routes->add('speciality', 'Speciality::index');
	$routes->add('patologie/update', 'Patologie::update');
	$routes->add('patologie', 'Patologie::index');
});
/*$routes->add('/admin/agents/update_agent', 'Agents::update_agent');
$routes->add('/admin/agents', 'Agents::index');

$routes->add('/admin/fornitore/update_fornitor', 'Fornitore::update_fornitor');
$routes->add('/admin/fornitore', 'Fornitore::index');

$routes->add('/admin/customers/add', 'Customers::add_customers');
$routes->add('/admin/customers/edit/(:num)', 'Customers::update_customers/$1');
$routes->add('/admin/customers/profile', 'Customers::profile');
$routes->add('/admin/customers', 'Customers::index');
*/


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
