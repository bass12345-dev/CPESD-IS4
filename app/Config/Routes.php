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

//Admin Panel
$routes->group('admin', function($routes) {
    $routes->add('dashboard', 'admin\DashboardController::index',['filter' => 'authGuard']);
    $routes->add('completed-transactions', 'admin\CompletedTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('pending-transactions', 'admin\PendingTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('cso', 'admin\CsoController::index',['filter' => 'authGuard']);
    $routes->add('responsibility-center', 'admin\ResponsibilityCenterController::index',['filter' => 'authGuard']);
    $routes->add('responsible-section', 'admin\ResponsibleSectionController::index',['filter' => 'authGuard']);
    $routes->add('type-of-activity', 'admin\TypeofActivityController::index',['filter' => 'authGuard']);
    $routes->add('users', 'admin\UserController::index',['filter' => 'authGuard']);
    $routes->add('completed-rfa', 'admin\PendingRFAController::index',['filter' => 'authGuard']);
    $routes->add('pending-rfa', 'admin\CompletedRFAController::index',['filter' => 'authGuard']);
    $routes->add('back-up-database', 'admin\BackupDatabaseController::index',['filter' => 'authGuard']);
    $routes->add('activity-logs', 'admin\ActivityLogsController::index',['filter' => 'authGuard']);
});


//View officers
$routes->get('admin/cso/view-officers', 'admin\CsoController::view_officers',['filter' => 'authGuard']);
$routes->get('admin/cso/cso-information', 'admin\CsoController::view_cso',['filter' => 'authGuard']);




//User Panel
$routes->group('user', function($routes) {
    $routes->add('dashboard', 'user\DashboardController::index',['filter' => 'authGuard']);
    $routes->add('completed-transactions', 'user\CompletedTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('pending-transactions', 'user\PendingTransactionsController::index',['filter' => 'authGuard']);
    $routes->add('completed-rfa', 'user\PendingRFAController::index',['filter' => 'authGuard']);
    $routes->add('pending-rfa', 'user\CompletedRFAController::index',['filter' => 'authGuard']);
    $routes->add('activity-logs', 'user\ActivityLogsController::index',['filter' => 'authGuard']);
});

$routes->get('user/pending-transactions/add-transaction', 'user\PendingTransactionsController::add_transaction',['filter' => 'authGuard']);


//Sign out
$routes->get('api/auth/sign_out', 'api\Auth::sign_out');

//Login
$routes->post('api/auth/verify', 'api\Auth::verify');

//Admin Api
//Database
$routes->post('api/back-up-db', 'api\BackupDB::index');
$routes->post('api/get-database', 'api\BackupDB::get_database');
//Users
$routes->post('api/add-user', 'api\Users::add_user');
$routes->post('api/get-active-user', 'api\Users::get_user_active');
$routes->post('api/get-inactive-user', 'api\Users::get_user_inactive');
$routes->post('api/update-user-status', 'api\Users::update_user_status');

//CSO
$routes->post('api/add-cso', 'api\Cso::add_cso');
$routes->post('api/get-cso', 'api\Cso::get_cso');
$routes->post('api/get-cso-infomation', 'api\Cso::get_cso_information');
$routes->post('api/update-cso-information', 'api\Cso::update_cso_information');
$routes->post('api/update-cso-status', 'api\Cso::update_cso_status');

//CSO Officers
$routes->post('api/add-officer', 'api\Cso::add_cso_officer');
$routes->post('api/get-officers', 'api\Cso::get_officers');
$routes->post('api/update-officer-information', 'api\Cso::update_officer');


//Responsibility Center
$routes->post('api/add-responsibility', 'api\Responsibility::add_responsibiliy');
$routes->post('api/get-responsiblity', 'api\Responsibility::get_responsibility');

//Responsible Section
$routes->post('api/add-responsible', 'api\ResponsibleSection::add_responsible');
$routes->post('api/get-responsible', 'api\ResponsibleSection::get_responsible');

//Type of Activity
$routes->post('api/add-type-of-activity', 'api\TypeOfActivity::add_type_of_activity');
$routes->post('api/get-activities', 'api\TypeOfActivity::get_activities');

//Under Type of Activity 
$routes->post('api/add-under-type-of-activity', 'api\TypeOfActivity::add_under_type_of_activity');
$routes->post('api/get_under_type_of_activity', 'api\TypeOfActivity::get_under_type_of_activity');

//User Api:
$routes->post('api/get-last-pmas-number', 'api\PendingTransactions::get_last_pmas_number');

//Add Transaction
$routes->post('api/add-transaction', 'api\PendingTransactions::add_transaction');

//Get Transactions
$routes->post('api/get-all-transactions', 'api\Transactions::get_all_transactions');


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
