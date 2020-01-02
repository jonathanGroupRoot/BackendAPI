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
    return $router->app->version();
});

$router->get('/api/listPessoas', 'PessoaController@list');

$router->post('/api/CadastrarPessoas','PessoaController@cadastrarPessoa');

$router->delete('/api/delete/{id}','PessoaController@delete');

$router->put('/api/atualizar/{id}', 'PessoaController@atualizar');