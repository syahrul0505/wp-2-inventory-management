<?php

namespace Config;

use Myth\Auth\Commands\CreateUser;

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
// $routes->get('/', 'Home::index');
$routes->get('/', 'DashboardController::index', ['as' => 'dashboard']);
$routes->get('contoh1', 'Contoh1::index');
$routes->get('penjumlahan/(:num)/(:num)', 'Contoh1::penjumlahan/$1/$2');
$routes->get('matakuliah', 'Matakuliah::index');
$routes->post('matakuliah/cetak', 'Matakuliah::cetak');
$routes->get('web', 'Web::index');
$routes->get('web/about', 'Web::about');

// ROLE
$routes->get('role', 'RoleController::index', ['as' => 'role_list']);
$routes->get('role/create', 'RoleController::create', ['as' => 'role_create']);
$routes->post('role', 'RoleController::store', ['as' => 'role_store']);
$routes->get('role/edit/(:num)', 'RoleController::edit/$1', ['as' => 'role_edit']);
$routes->put('role/(:num)', 'RoleController::update/$1', ['as' => 'role_update']);
$routes->delete('role/(:num)', 'RoleController::delete/$1', ['as' => 'role_delete']);

// Material
$routes->get('material', 'MaterialController::index', ['as' => 'material.index']);
$routes->get('material/create', 'MaterialController::create', ['as' => 'material.create']);
$routes->post('material', 'MaterialController::store', ['as' => 'material.store']);
$routes->get('material/edit/(:num)', 'MaterialController::edit/$1', ['as' => 'material.edit']);
$routes->put('material/(:num)', 'MaterialController::update/$1', ['as' => 'material.update']);
$routes->delete('material/(:num)', 'MaterialController::delete/$1', ['as' => 'material.delete']);

// Supplier
$routes->get('supplier', 'SupplierController::index', ['as' => 'supplier.index']);
$routes->get('supplier/create', 'SupplierController::create', ['as' => 'supplier.create']);
$routes->post('supplier', 'SupplierController::store', ['as' => 'supplier.store']);
$routes->get('supplier/edit/(:num)', 'SupplierController::edit/$1', ['as' => 'supplier.edit']);
$routes->put('supplier/(:num)', 'SupplierController::update/$1', ['as' => 'supplier.update']);
$routes->delete('supplier/(:num)', 'SupplierController::delete/$1', ['as' => 'supplier.delete']);


// Inventory List Stock
$routes->get('list-stock', 'ListStockController::index', ['as' => 'list-stock.index']);

// Stock In Material
$routes->get('stock-in-material', 'StockInMaterialController::index', ['as' => 'stock-in-material.index']);
$routes->get('stock-in-material/create', 'StockInMaterialController::create', ['as' => 'stock-in-material.create']);
$routes->post('stock-in-material', 'StockInMaterialController::store', ['as' => 'stock-in-material.store']);
$routes->get('stock-in-material/edit/(:num)', 'StockInMaterialController::edit/$1', ['as' => 'stock-in-material.edit']);
$routes->put('stock-in-material/(:num)', 'StockInMaterialController::update/$1', ['as' => 'stock-in-material.update']);
$routes->delete('stock-in-material/(:num)', 'StockInMaterialController::delete/$1', ['as' => 'stock-in-material.delete']);

// Stock Out Material
$routes->get('stock-out-material', 'StockOutMaterialController::index', ['as' => 'stock-out-material.index']);
$routes->get('stock-out-material/create', 'StockOutMaterialController::create', ['as' => 'stock-out-material.create']);
$routes->post('stock-out-material', 'StockOutMaterialController::store', ['as' => 'stock-out-material.store']);
$routes->get('stock-out-material/edit/(:num)', 'StockOutMaterialController::edit/$1', ['as' => 'stock-out-material.edit']);
$routes->put('stock-out-material/(:num)', 'StockOutMaterialController::update/$1', ['as' => 'stock-out-material.update']);
$routes->delete('stock-out-material/(:num)', 'StockOutMaterialController::delete/$1', ['as' => 'stock-out-material.delete']);

// USER MANAGEMENT
$routes->get('user', 'UserController::index', ['as' => 'user_list']);
$routes->get('user/create', 'UserController::create', ['as' => 'user_create']);
$routes->post('user', 'UserController::store', ['as' => 'user_store']);
$routes->get('user/edit/(:num)', 'UserController::edit/$1', ['as' => 'user_edit']);
$routes->put('user/(:num)', 'UserController::update/$1', ['as' => 'user_update']);
$routes->delete('user/(:num)', 'UserController::delete/$1', ['as' => 'user_delete']);
$routes->get('user/(:num)', 'UserController::userProfile/$1', ['as' => 'user_profile']);

// MASTER DATA
$routes->get('master-data', function () {
    $data['title'] = 'Master Data';
    return view('master-data/index', $data);
});




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
