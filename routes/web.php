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
//Rota Pessoa
$router->get('/api/listPessoas', 'PessoaController@list');
$router->post('/api/CadastrarPessoas','PessoaController@cadastrarPessoa');
$router->delete('/api/delete/{id}','PessoaController@delete');
$router->put('/api/atualizarPessoa/{id}', 'PessoaController@atualizar');

//Rota Dentista
$router->get('/api/listarDentista','DentistaController@listDentista');
$router->post('/api/cadastrarDentista','DentistaController@cadastrarDentista');
$router->delete('/api/deleteDentista/{id}','DentistaController@deleteDentista');
$router->put('/api/atualizar/{id}','DentistaController@atualizar');

//Rota Procedimento
$router->get('/api/listarProcedimentos','ProcedimentoController@listarProcedimento');
$router->post('/api/cadastrarProcedimento','ProcedimentoController@cadastrarProcedimento');
$router->delete('/api/deletarProcedimento/{id}','ProcedimentoController@deletarProcedimento');
$router->put('/api/atualizarProcedimento/{id}','ProcedimentoController@atualizarProcedimento');

//Rota Acompanhante
$router->get('/api/listarAcompanhante','AcompanhanteController@listarAcompanhante');
$router->post('/api/cadastrarAcompanhante','AcompanhanteController@cadastrarAcompanhante');
$router->delete('/api/deletarAcompanhante/{id}','AcompanhanteController@deletarAcompanhante');
$router->put('/api/atualizarAcompanhante/{id}','AcompanhanteController@atualizarAcompanhante');

//Rota Cliente
$router->get('/api/listarCliente','ClienteController@listarCliente');
$router->post('/api/cadastrarCliente','ClienteController@cadastrarCliente');
$router->delete('/api/deletarCliente/{id}','ClienteController@deletarCliente');
$router->put('/api/atualizarCliente/{id}','ClienteController@atualizarCliente');

//Rota Consulta
$router->get('api/listarConsulta','ConsultaController@listarConsultas');
$router->post('/api/cadastrarConsulta','ConsultaController@cadastrarConsultas');
$router->delete('/api/deletarConsulta/{id}','ConsultaController@deletarConsulta');
$router->put('/api/atualizarConsulta/{id}','ConsultaController@atualizarConsulta');

//Rota Colaborador
$router->get('/api/listarColaboradores','ColaboradorController@listarColaboradores');
$router->post('/api/cadastrarColaboradores','ColaboradorController@cadastrarColaboradores');
$router->delete('/api/deletarColaboradores/{id}','ColaboradorController@deletarColaboradores');
$router->put('/api/atualizarColaboradores/{id}','ColaboradorController@atualizarColaboradores');

//Rota Fornecedor
$router->get('/api/listarFornecedores','FornecedorController@listarFornecedores');
$router->post('/api/cadastrarFornecedores','FornecedorController@cadastrarFornecedores');
$router->delete('api/deletarFornecedores/{id}','FornecedorController@deletarFornecedores');
$router->put('/api/atualizarFornecedores/{id}','FornecedorController@atualizarFornecedores');

//Rota Material
$router->get('/api/listarMaterial','MaterialController@listarMaterial');
$router->post('api/cadastrarMaterial','MaterialController@cadastrarMaterial');
$router->delete('/api/deletarMaterial/{id}','MaterialController@deletarMaterial');
$router->put('/api/atualizarMaterial/{id}','MaterialController@atualizarMaterial');

//Rota Estoque
$router->get('/api/listarEstoque','EstoqueController@listarEstoque');
$router->post('/api/cadastrarEstoque','EstoqueController@cadastrarEstoque');
$router->delete('/api/deletarEstoque/{id}','EstoqueController@deletarEstoque');
$router->put('/api/atualizarEstoque/{id}','EstoqueController@atualizarEstoque');

//Rota Entrada
$router->get('/api/listarEntrada','EntradaController@listarEntrada');
$router->post('/api/cadastrarEntrada','EntradaController@cadastrarEntrada');
$router->delete('/api/deletarEntrada/{id}','EntradaController@deletarEntrada');
$router->put('/api/atualizarEntrada/{id}','EntradaController@atualizarEntrada');