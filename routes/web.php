<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\EmisoraController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Rutas para emisoras
$router->get('/emisoras', 'EmisoraController@index');
$router->get('/emisora/{id}', 'EmisoraController@show');
$router->post('/emisora', 'EmisoraController@store');
$router->put('/emisora/{id}', 'EmisoraController@update');
$router->delete('/emisora/{id}', 'EmisoraController@destroy');

//Rutas para trabajadores
$router->get('/trabajadores', 'TrabajadorController@index');
$router->get('/trabajador/{id}', 'TrabajadorController@show');
$router->post('/trabajador', 'TrabajadorController@store');
$router->put('/trabajador/{id}', 'TrabajadorController@update');
$router->delete('/trabajador/{id}', 'TrabajadorController@destroy');

//Rutas para modelos
$router->get('/modelos', 'ModeloController@index');
$router->get('/modelo/{id}', 'ModeloController@show');
$router->post('/modelo', 'ModeloController@store');
$router->put('/modelo/{id}', 'ModeloController@update');
$router->delete('/modelo/{id}', 'ModeloController@destroy');

//Rutas para fuerza_trabs
$router->get('/fuerza_trabajo_all', 'FuerzaTrabController@index');
$router->get('/fuerza_trabajo/{id}', 'FuerzaTrabController@show');
$router->post('/fuerza_trabajo', 'FuerzaTrabController@store');
$router->put('/fuerza_trabajo/{id}', 'FuerzaTrabController@update');
$router->delete('/fuerza_trabajo/{id}', 'FuerzaTrabController@destroy');

