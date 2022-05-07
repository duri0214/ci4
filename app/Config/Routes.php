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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
$routes->setPrioritize();

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index', ['as' => 'home']);
$routes->get('(:any)', 'Pages::view/$1', ['priority' => 1]);
$routes->get('home/csv_export', 'HomeController::csvExport', ['as' => 'home_csv_export']);
$routes->get('home/excel_export', 'HomeController::excelExport', ['as' => 'home_excel_export']);
$routes->get('home/rotate_pdf', 'HomeController::rotatePdf', ['as' => 'home_rotate_pdf']);
$routes->get('home/store', 'HomeController::store', ['as' => 'home_store']);
$routes->get('home/api/(\w+)/(\d+)', 'HomeController::store/$1/$2', ['as' => 'home_api']);

$routes->post('register', 'AuthController::attemptRegister');
$routes->get('school', 'SchoolController::index', ['as' => 'school_home']);
$routes->get('school/admin/menu', 'SchoolAdminController::menu', ['as' => 'admin_menu']);
$routes->get('school/admin/unregistered/list', 'SchoolAdminController::unregisteredList', ['as' => 'unregistered_list']);
$routes->post('school/admin/unregistered/user_register', 'SchoolAdminController::userRegister', ['as' => 'user_register']);
$routes->get('school/lesson/list', 'SchoolLessonController::lessonList', ['as' => 'lesson_list']);
$routes->get('school/lesson/(:num)/item/list', 'SchoolLessonController::lessonItemList/$1', ['as' => 'lesson_detail']);
$routes->get('school/lesson/create', 'SchoolLessonController::lessonCreate', ['as' => 'lesson_create']);
$routes->post('school/lesson/register', 'SchoolLessonController::lessonRegister', ['as' => 'lesson_register']);
$routes->match(['get', 'post'], 'school/lesson/edit', 'SchoolLessonController::edit', ['as' => 'lesson_edit']);
$routes->match(['get', 'post'], 'school/lesson/(:num)/item/create', 'SchoolLessonController::lessonItemCreate/$1', ['as' => 'lesson_item_create']);
$routes->match(['get', 'post'], 'school/lesson/(:num)/item/(:num)/edit', 'SchoolLessonController::lessonItemEdit/$1/$2', ['as' => 'lesson_item_edit']);
$routes->get('school/upload/lesson', 'SchoolUploadController::indexLesson', ['as' => 'lesson_upload_get']);
$routes->get('school/upload/postal', 'SchoolUploadController::indexPostal', ['as' => 'postal_upload_get']);
$routes->post('school/upload/postal', 'SchoolUploadController::importFile', ['as' => 'postal_upload_post']);
$routes->get('school/cert/list', 'SchoolCertController::certList', ['as' => 'cert_list']);
$routes->get('school/cert/(:num)/item/list', 'SchoolCertController::certItemList/$1', ['as' => 'cert_item_list']);
$routes->post('school/cert/info/register', 'SchoolCertController::certInfoRegister', ['as' => 'cert_info_register']);
$routes->post('school/cert/addNewItem', 'SchoolCertController::addNewItem', ['as' => 'cert_add_item']);
$routes->post('school/report/menu', 'SchoolCertController::addNewItem', ['as' => 'report_menu']);

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
