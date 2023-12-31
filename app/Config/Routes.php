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
// Controlador por defecto
$routes->setDefaultController('App\Controllers\Front\Home');
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


// Podemos agrupar rutas bajo un nombre común
// El prefijo aparecerá antes de cada ruta definida
// dentro de los corchetes podemos definir un namespace (en donde buscará los controladores)
$routes->group('home', ["namespace" => "App\Controllers\Front"], function ($routes) {
    $routes->get('/', 'Home::index', ['as' => 'home']);
    // Con segment le indicamos que será una ruta dinamica
    $routes->get('articulo/(:segment)', 'Home::article/$1', ['as' => 'article']);
});

$routes->group('auth', ["namespace" => "App\Controllers\Auth"], function ($routes) {
    $routes->get('registro', 'Register::index', ['as' => 'register']);
    $routes->post('store', 'Register::store');
    $routes->get('login', 'Login::index', ['as' => 'login']);
    $routes->post('check', 'Login::signin');
    $routes->get('signout', 'Login::signout', ['as' => 'signout']);
});

// Agregamos un filtro a este grupo
// Pasamos los argumentos al filtro de auth
$routes->group('admin', ["namespace" => "App\Controllers\Admin", 'filter' => 'auth:admin'], function ($routes) {
    $routes->get('articulos', 'Posts::index', ['as' => 'posts']);
    $routes->get('articulos/crear', 'Posts::create', ['as' => 'posts_create']);
    $routes->post('articulos/guardar', 'Posts::store', ['as' => 'posts_store']);

    $routes->get('categorias', 'Categories::index', ['as' => 'categories']);
    $routes->get('categorias/crear', 'Categories::create', ['as' => 'categories_create']);
    $routes->post('categorias/guardar', 'Categories::store', ['as' => 'categories_store']);

    $routes->get('categorias/editar/(:any)', 'Categories::edit/$1', ['as' => 'categories_edit']);
    $routes->post('categorias/actualizar', 'Categories::update', ['as' => 'categories_update']);
    $routes->get('categorias/eliminar/(:any)', 'Categories::delete/$1', ['as' => 'categories_delete']);
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
