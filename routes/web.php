<?php

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


$router->get('/',  ['as' => 'index', 'uses' => 'SiteController@index']);


$router->group(['prefix' => 'queues'], function () use ($router) {
	$router->get('/',  ['as' => 'queue.get', 'uses' => 'QueuesController@get']);
	$router->post('/',  ['as' => 'queue.enqueue', 'uses' => 'QueuesController@enqueue']);
	$router->delete('/',  ['as' => 'queue.dequeue', 'uses' => 'QueuesController@dequeue']);
});

$router->group(['prefix' => 'aircrafts'], function () use ($router) {
	$router->get('/',  ['as' => 'aircraft.get', 'uses' => 'AircraftsController@get']);
	$router->get('/{id}',  ['as' => 'aircraft.show', 'uses' => 'AircraftsController@show']);
	$router->post('/',  ['as' => 'aircraft.post', 'uses' => 'AircraftsController@create']);
	$router->put('/{id}',  ['as' => 'aircraft.put', 'uses' => 'AircraftsController@update']);
	$router->delete('/{id}',  ['as' => 'aircraft.delete', 'uses' => 'AircraftsController@delete']);
});