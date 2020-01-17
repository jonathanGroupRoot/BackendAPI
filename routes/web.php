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


//Rota Pessoa
$router->get('/api/listPessoas', 'PessoaController@list');
$router->post('/api/CadastrarPessoas','PessoaController@cadastrarPessoa');
$router->delete('/api/delete/{id}','PessoaController@delete');
$router->put('/api/atualizarPessoa/{id}', 'PessoaController@atualizar');
$router->get('/api/editarPessoa/{id}','PessoaController@editar');

//Rota Dentista
$router->get('/api/listarDentista','DentistaController@listDentista');
$router->post('/api/cadastrarDentista','DentistaController@cadastrarDentista');
$router->delete('/api/deleteDentista/{id}','DentistaController@deleteDentista');
$router->put('/api/atualizar/{id}','DentistaController@atualizar');
$router->get('/api/editarDentista/{id}', 'DentistaController@editar');

//Rota Procedimento
$router->get('/api/listarProcedimentos','ProcedimentoController@listarProcedimento');
$router->post('/api/cadastrarProcedimento','ProcedimentoController@cadastrarProcedimento');
$router->delete('/api/deletarProcedimento/{id}','ProcedimentoController@deletarProcedimento');
$router->put('/api/atualizarProcedimento/{id}','ProcedimentoController@atualizarProcedimento');
$router->get('/api/editarProcedimento/{id}','ProcedimentoController@editar');

//Rota Acompanhante
$router->get('/api/listarAcompanhante','AcompanhanteController@listarAcompanhante');
$router->post('/api/cadastrarAcompanhante','AcompanhanteController@cadastrarAcompanhante');
$router->delete('/api/deletarAcompanhante/{id}','AcompanhanteController@deletarAcompanhante');
$router->put('/api/atualizarAcompanhante/{id}','AcompanhanteController@atualizarAcompanhante');
$router->get('/api/editarAcompanhante/{id}','AcompanhanteController@editar');

//Rota Cliente
$router->get('/api/listarCliente','ClienteController@listarCliente');
$router->post('/api/cadastrarCliente','ClienteController@cadastrarCliente');
$router->delete('/api/deletarCliente/{id}','ClienteController@deletarCliente');
$router->put('/api/atualizarCliente/{id}','ClienteController@atualizarCliente');
$router->get('/api/editarCliente/{id}', 'ClienteController@editar');

//Rota Consulta
$router->get('api/listarConsulta','ConsultaController@listarConsultas');
$router->post('/api/cadastrarConsulta','ConsultaController@cadastrarConsultas');
$router->delete('/api/deletarConsulta/{id}','ConsultaController@deletarConsulta');
$router->put('/api/atualizarConsulta/{id}','ConsultaController@atualizarConsulta');
$router->get('/api/editarConsulta/{id} ','ConsultaController@editar');

//Rota Colaborador
$router->get('/api/listarColaboradores','ColaboradorController@listarColaboradores');
$router->post('/api/cadastrarColaboradores','ColaboradorController@cadastrarColaboradores');
$router->delete('/api/deletarColaboradores/{id}','ColaboradorController@deletarColaboradores');
$router->put('/api/atualizarColaboradores/{id}','ColaboradorController@atualizarColaboradores');
$router->get('api/editarColaboradores/{id}','ColaboradorController@editar');

//Rota Fornecedor
$router->get('/api/listarFornecedores','FornecedorController@listarFornecedores');
$router->post('/api/cadastrarFornecedores','FornecedorController@cadastrarFornecedores');
$router->delete('api/deletarFornecedores/{id}','FornecedorController@deletarFornecedores');
$router->put('/api/atualizarFornecedores/{id}','FornecedorController@atualizarFornecedores');
$router->get('api/editarFornecedores/{id}','FornecedorController@editar');

//Rota Material
$router->get('/api/listarMaterial','MaterialController@listarMaterial');
$router->post('api/cadastrarMaterial','MaterialController@cadastrarMaterial');
$router->delete('/api/deletarMaterial/{id}','MaterialController@deletarMaterial');
$router->put('/api/atualizarMaterial/{id}','MaterialController@atualizarMaterial');
$router->get('api/editarMaterial/{id}','MaterialController@editar');

//Rota Estoque
$router->get('/api/listarEstoque','EstoqueController@listarEstoque');
$router->post('/api/cadastrarEstoque','EstoqueController@cadastrarEstoque');
$router->delete('/api/deletarEstoque/{id}','EstoqueController@deletarEstoque');
$router->put('/api/atualizarEstoque/{id}','EstoqueController@atualizarEstoque');
$router->get('/api/editarEstoque/{id}','EstoqueController@editar');

//Rota Entrada Estoque
$router->get('/api/listarEntrada','EntradaController@listarEntrada');
$router->post('/api/Entrada','EntradaController@entradaEstoque');
$router->delete('/api/deletarEntrada/{id}','EntradaController@deletarEntrada');
$router->put('/api/atualizarEntrada/{id}','EntradaController@atualizarEntrada');

//Rota Saida Estoque
$router->get('/api/listarSaida','SaidaController@listarSaida');
$router->post('/api/saidaEstoque','SaidaController@saidaEstoque');
$router->delete('/api/delSaida/{id}','SaidaController@deletarSaida');
$router->put('/api/atualizarSaida/{id}','SaidaController@atualizarSaida');

//Rota Caixa
$router->post('/api/EntradaCaixa','CaixaController@entradaCaixa');
$router->post('/api/somaCaixa','CaixaController@somarCaixa');