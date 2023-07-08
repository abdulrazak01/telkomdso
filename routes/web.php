<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('api/register',['uses' => 'LoginController@register']);
$router->post('api/login',['uses' => 'LoginController@login']);

// $router->group(['prefix' => 'api','middleware' => 'auth', 'Authenticate: teknisi' ], function() use ($router){
    $router->post('api/qe/add','QeController@add');
    $router->get('api/qe/get/{id}','QeController@get');

   
    $router->post('api/qe/getdata_qe_prepare','QeController@getdata_qe_prepare');
    $router->post('api/qe/add_qe_rekon','QeController@add_qe_rekon');


    $router->get('api/list/type','GetListController@getList_type');

    $router->get('api/list/stos','GetListController@getList_stos');
    $router->get('api/list/designator','GetListController@getList_designator');
    $router->get('api/list/mitra','GetListController@getList_mitra');

    
// });
