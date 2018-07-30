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

$router->get('/', function () use ($router) {
    return response()->json($router->app->version());
});

$router->group(['prefix' => 'v1'], function () use ($router) {
    // GET index()
    $router->get('/pokemon', 'PokemonController@index');

    // POST store()
    $router->post('/pokemon', 'PokemonController@store');

    // GET $id show()
    $router->get('/pokemon/{id:[\d]+}', 'PokemonController@show');

    // PUT $id update()
    $router->put('/pokemon/{id:[\d]+}', 'PokemonController@update');

    // DELETE $id destroy()
    $router->delete('/pokemon/{id:[\d]+}', 'PokemonController@destroy');
});
