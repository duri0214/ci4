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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::index');
$routes->get('home/csv_export', 'HomeController::csvExport');
$routes->get('home/excel_export', 'HomeController::excelExport');
$routes->get('home/rotate_pdf', 'HomeController::rotatePdf');
$routes->get('home/store', 'HomeController::store');
$routes->get('home/api/(\w+)/(\d+)', 'HomeController::store/$1/$2');

$routes->get('school', 'SchoolController::index', ['as' => 'school_home']);
$routes->get('school/lesson/list', 'SchoolLessonController::index', ['as' => 'lesson_list']);
$routes->get('school/lesson/(\d+)', 'SchoolLessonController::lessonDetail/$1', ['as' => 'lesson_detail']);
$routes->post('school/lesson/register/(\d+)', 'SchoolLessonController::lessonRegister/$1');
$routes->get('school/lesson/upload', 'SchoolUploadController::index', ['as' => 'lesson_upload']);
$routes->post('school/lesson/upload', 'SchoolUploadController::importFile');

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
