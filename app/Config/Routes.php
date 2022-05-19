<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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
//auth
$routes->get('/', 'Auth::index');
$routes->post('login/proced', 'Auth::LoginProced');
$routes->get('register', 'Auth::Register');
$routes->post('register/proced', 'Auth::RegisterProced');

//grouping so that the routes doesnt messed up
$routes->group('dashboard', ['filter' => 'authGuard'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->group('strukturssb', ['filter' => 'authGuardRole'], function ($routes) {
        $routes->get('/', 'Dashboard::strukturSSB');
        $routes->get('add', 'Dashboard::add');
        $routes->post('store', 'Dashboard::store');
        $routes->get('delete/(:num)', 'Dashboard::delete/$1');
    });
    $routes->group('user', ['filter' => 'authGuardRole'], function ($routes) {
        $routes->get('/', 'Users::index');
        $routes->get('add', 'Users::add');
        $routes->post('store', 'Users::store');
        $routes->get('delete/(:num)', 'Users::delete/$1');
        $routes->get('edit/(:num)', 'Users::edit/$1');
        $routes->post('update', 'Users::update');
    });
    $routes->group('profile', function ($routes) {
        $routes->get('saya/(:num)', 'Profile::index/$1');
        $routes->post('saya/update', 'Profile::update');
    });
    $routes->group('post', ['filter' => 'authGuardRole'], function ($routes) {
        $routes->get('/', 'Posts::index');
        $routes->get('add', 'Posts::add');
        $routes->post('store', 'Posts::store');
        $routes->get('delete/(:num)', 'Posts::delete/$1');
        $routes->get('edit/(:num)', 'Posts::edit/$1');
        $routes->post('update', 'Posts::update');
    });
    $routes->group('kandidat', ['filter' => 'authGuardRole'], function ($routes) {
        $routes->get('/', 'Kandidat::index');
        $routes->get('edit/(:num)', 'Kandidat::edit/$1');
        $routes->post('update', 'Kandidat::update');
    });
    $routes->group('transaksi', ['filter' => 'authGuardRole'], function ($routes) {
        $routes->get('/', 'Transaction::index');
        $routes->get('add', 'Transaction::add');
        $routes->post('store', 'Transaction::store');
        $routes->get('edit/(:num)', 'Transaction::edit/$1');
        $routes->post('update', 'Transaction::update');
        $routes->get('delete/(:num)', 'Transaction::delete/$1');
    });
    //pendaftaran
    $routes->group('pendaftaran', function ($routes) {
        $routes->get('id/(:num)', 'Pendaftaran::index/$1');
        $routes->post('kirim', 'Pendaftaran::store');
    });
    //riwayatclub
    $routes->group('riwayatclub', function ($routes) {
        $routes->get('/', 'RiwayatClub::index');
    });
    //jadwal
    $routes->group('jadwal', function ($routes) {
        $routes->get('/', 'Jadwal::index');
    });
    //tagihan
    $routes->group('tagihan', function ($routes) {
        $routes->get('saya/(:num)', 'Tagihan::index/$1');
    });
});
//logout
$routes->get('logout', 'Auth::Logout');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
