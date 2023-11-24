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
$routes->get('/', 'Home::index');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/quienes-somos', 'Home::quienes_somos');
$routes->get('/term-usos', 'Home::terminos_usos');
$routes->get('/productos', 'Home::productos');
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

$routes->get('registro', 'SignupController::index');
$routes->match(['get', 'post'], 'registro', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('ingresar', 'SigninController::index');

$routes->match(['get', 'post'], 'contacto', 'ContactoController::store');
$routes->post('consulta/guardarConsulta', 'ConsultaController::guardarConsulta');



//sesion iniciada
$routes->get('indexIngresado', 'ProfileController::index');
$routes->get('dashboard', 'ProfileController::dashboard');
$routes->add('logout', 'ProfileController::logout');

$routes->get('comercializacionIngresado', 'ProfileController::comercializacion');
$routes->get('consulta', 'ProfileController::consulta');
$routes->get('/term-usosIngresado', 'ProfileController::terminos_usos');
$routes->get('productosIngresado', 'ProfileController::productos');
$routes->get('/quienes-somosIngresado', 'ProfileController::quienes_somos');


//admin
$routes->get('dashboard', 'ProfileController::dashboard');
$routes->get('listar', 'ProfileController::listar');
$routes->get('bajausuarios', 'ProfileController::listarbaja');
$routes->get('/dardebaja/(:num)', 'ProfileController::darDeBaja/$1');
$routes->get('/dardealta/(:num)', 'ProfileController::darDeAlta/$1');
$routes->get('listarContacto', 'ProfileController::listarContacto');

$routes->get('listarConsulta', 'ProfileController::listarConsulta');
$routes->get('/leido/(:num)', 'ProfileController::leidoConsulta/$1');
$routes->get('/leidoContacto/(:num)', 'ProfileController::leidoContacto/$1');
$routes->get('/desleidoContacto/(:num)', 'ProfileController::leidoContacto/$1');





$routes->get('/agregarProducto', 'ProductosController::create');
$routes->post('/agregarProducto', 'ProductosController::store');
$routes->get('/listarProductos', 'ProductosController::listarProductos');

$routes->get('editar/(:num)', 'ProductosController::editar/$1');
$routes->post('actualizar', 'ProductosController::actualizar');


$routes->get('productosDadosDeBaja', 'ProductosController::listarbaja');
$routes->get('/dardebajaProducto/(:num)', 'ProductosController::darDeBaja/$1');
$routes->get('/dardealtaProducto/(:num)', 'ProductosController::darDeAlta/$1');



$routes->get('catalogo', 'ProductosController::catalogo');
$routes->get('catalogoIngresado', 'ProductosController::catalogoIngresado');


$routes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('carrito', 'CarritoController::index');
    $routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1');
    $routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');
    $routes->get('carrito/checkout', 'CarritoController::checkout');
    $routes->get('carrito/obtenerCantidad', 'CarritoController::obtenerCantidad');
    $routes->get('carrito/vaciar', 'CarritoController::vaciar');
    $routes->get('carrito/aumentar/(:num)', 'CarritoController::aumentar/$1');
    $routes->get('carrito/disminuir/(:num)', 'CarritoController::disminuir/$1');

});
$routes->get('carrito/checkout', 'CarritoController::checkout');
$routes->get('carrito/exito/(:num)', 'CarritoController::exito/$1');



$routes->get('listarCategorias', 'ProductosController::listarCategorias');
$routes->get('/agregarCategorias', 'ProductosController::createCategorias');
$routes->post('/agregarCategorias', 'ProductosController::storeCategorias');
$routes->get('editarCategorias/(:num)', 'ProductosController::editarCategorias/$1');
$routes->post('actualizarCategorias', 'ProductosController::actualizarCategorias');
$routes->get('categoriasDadosDeBaja', 'ProductosController::listarbajaCategorias');
$routes->get('/dardebajaCategorias/(:num)', 'ProductosController::darDeBajaCategorias/$1');
$routes->get('/dardealtaCategorias/(:num)', 'ProductosController::darDeAltaCategorias/$1');

$routes->get('misCompras', 'CarritoController::compraUsuario');



$routes->get('facturas/(:num)', 'ProfileController::facturas/$1');

$routes->post('listarProductos', 'ProductosController::listarProductos');
$routes->post('listar', 'ProfileController::listar');


