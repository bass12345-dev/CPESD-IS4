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

//Authentication
$routes->get('/login', 'auth\LoginController::index',['filter' => 'usercheck']);


//Admin Panel
$routes->get('/', 'Home::index');

//User Panel
$routes->group('admin', function($routes) {
    $routes->add('dashboard', 'admin\DashboardController::index',['filter' => 'authGuard']);
    $routes->add('completed-transactions', 'admin\CompletedTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('pending-transactions', 'admin\PendingTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('cso', 'admin\CsoController::index',['filter' => 'authGuard']);
    $routes->add('responsibility-center', 'admin\ResponsibilityCenterController::index',['filter' => 'authGuard']);
    $routes->add('responsible-section', 'admin\ResponsibleSectionController::index',['filter' => 'authGuard']);
    $routes->add('type-of-activity', 'admin\TypeofActivityController::index',['filter' => 'authGuard']);
    $routes->add('users', 'admin\UserController::index',['filter' => 'authGuard']);
    $routes->add('complete-rfa', 'admin\PendingRFAController::index',['filter' => 'authGuard']);
    $routes->add('pending-rfa', 'admin\CompletedRFAController::index',['filter' => 'authGuard']);
    $routes->add('back-up-database', 'admin\BackupDatabaseController::index',['filter' => 'authGuard']);
    $routes->add('activity-logs', 'admin\ActivityLogsController::index',['filter' => 'authGuard']);
});

//User Panel
$routes->group('user', function($routes) {
    $routes->add('dashboard', 'user\DashboardController::index',['filter' => 'authGuard']);
    $routes->add('completed-transactions', 'user\CompletedTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('pending-transactions', 'user\PendingTransactionsController::index',['filter' => 'authGuard']);
    

    
});

//Sign out
$routes->get('api/auth/sign_out', 'api\Auth::sign_out');


//Api

$routes->post('api/auth/verify', 'api\Auth::verify');
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
