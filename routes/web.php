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



//Rota Dentista
$router->get('/api/listarDentista','DentistaController@listDentista');
$router->post('/api/cadastrarDentista','DentistaController@cadastrarDentista');
$router->delete('/api/deleteDentista/{id}','DentistaController@deleteDentista');
$router->post('/api/atualizar/{id}','DentistaController@atualizar');
$router->get('/api/editarDentista/{id}', 'DentistaController@editar');
$router->get('/api/pesquisarDentista','DentistaController@pesquisar');

//Rota Procedimento
$router->get('/api/listarProcedimentos','ProcedimentoController@listarProcedimento');
$router->post('/api/cadastrarProcedimento','ProcedimentoController@cadastrarProcedimento');
$router->delete('/api/deletarProcedimento/{id}','ProcedimentoController@deletarProcedimento');
$router->post('/api/atualizarProcedimento/{id}','ProcedimentoController@atualizarProcedimento');
$router->get('/api/editarProcedimento/{id}','ProcedimentoController@editar');
$router->get('/api/pesquisarProcedimentos','ProcedimentoController@pesquisar');

//Rota Acompanhante
$router->get('/api/listarAcompanhante','AcompanhanteController@listarAcompanhante');
$router->post('/api/cadastrarAcompanhante','AcompanhanteController@cadastrarAcompanhante');
$router->delete('/api/deletarAcompanhante/{id}','AcompanhanteController@deletarAcompanhante');
$router->post('/api/atualizarAcompanhante/{id}','AcompanhanteController@atualizarAcompanhante');
$router->get('/api/editarAcompanhante/{id}','AcompanhanteController@editar');
$router->get('/api/pesquisarAcompanhante/','AcompanhanteController@pesquisarAcompanhante');

//Rota Cliente
$router->get('/api/listarCliente','ClienteController@listarCliente');
$router->post('/api/cadastrarCliente','ClienteController@cadastrarCliente');
$router->delete('/api/deletarCliente/{id}','ClienteController@deletarCliente');
$router->post('/api/atualizarCliente/{id}','ClienteController@atualizarCliente');
$router->get('/api/editarCliente/{id}', 'ClienteController@editar');
$router->get('/api/pesquisarClientes','ClienteController@pesquisarClientes');

//Rota Consulta
$router->get('api/listarConsulta','ConsultaController@listarConsultas');
$router->post('/api/cadastrarConsulta','ConsultaController@cadastrarConsultas');
$router->delete('/api/deletarConsulta/{id}','ConsultaController@deletarConsulta');
$router->post('/api/atualizarConsulta/{id}','ConsultaController@atualizarConsulta');
$router->get('/api/editarConsulta/{id}','ConsultaController@editar');
$router->get('/api/pesquisarConsultas','ConsultaController@pesquisarConsultas');

//Rota Prontuário
$router->get('api/listarProntuarios','ProntuarioController@listarProntuarios');
$router->post('/api/cadastrarProntuarios','ProntuarioController@cadastrarProntuarios');
$router->delete('/api/deletarProntuarios/{id}','ProntuarioController@deletarProntuarios');
$router->get('/api/editarProntuarios/{id}','ProntuarioController@editarProntuarios');
$router->post('/api/atualizarProntuarios/{id}','ProntuarioController@atualizarProntuarios');
$router->get('/api/pesquisarProntuarios','ProntuarioController@pesquisarProntuarios');

//Rota Colaborador
$router->get('/api/listarColaboradores','ColaboradorController@listarColaboradores');
$router->post('/api/cadastrarColaboradores','ColaboradorController@cadastrarColaboradores');
$router->delete('/api/deletarColaboradores/{id}','ColaboradorController@deletarColaboradores');
$router->post('/api/atualizarColaboradores/{id}','ColaboradorController@atualizarColaboradores');
$router->get('api/editarColaboradores/{id}','ColaboradorController@editar');
$router->get('/api/pesquisarColaboradores','ColaboradorController@pesquisar');

//Rota Fornecedor
$router->get('/api/listarFornecedores','FornecedorController@listarFornecedores');
$router->post('/api/cadastrarFornecedores','FornecedorController@cadastrarFornecedores');
$router->delete('api/deletarFornecedores/{id}','FornecedorController@deletarFornecedores');
$router->post('/api/atualizarFornecedores/{id}','FornecedorController@atualizarFornecedores');
$router->get('api/editarFornecedores/{id}','FornecedorController@editar');
$router->get('/api/pesquisarFornecedores','FornecedorController@pesquisarFornecedores');

//Rota Material
$router->get('/api/listarMaterial','MaterialController@listarMaterial');
$router->post('api/cadastrarMaterial','MaterialController@cadastrarMaterial');
$router->delete('/api/deletarMaterial/{id}','MaterialController@deletarMaterial');
$router->post('/api/atualizarMaterial/{id}','MaterialController@atualizarMaterial');
$router->get('/api/editarMaterial/{id}','MaterialController@editar');
$router->get('/api/pesquisarMateriais','MaterialController@pesquisarMateriais');

//Rota Estoque
$router->get('/api/listarEstoque','EstoqueController@listarEstoque');
$router->post('/api/cadastrarEstoque','EstoqueController@cadastrarEstoque');
$router->delete('/api/deletarEstoque/{id}','EstoqueController@deletarEstoque');
$router->get('/api/pesquisarEstoque','EstoqueController@pesquisarEstoque');

//Rota Entrada Estoque
$router->get('/api/listarEntrada','EntradaController@listarEntrada');
$router->post('/api/Entrada','EntradaController@entradaEstoque');
$router->delete('/api/deletarEntrada/{id}','EntradaController@deletarEntrada');
$router->post('/api/atualizarEntrada/{id}','EntradaController@atualizarEntrada');

//Rota Saida Estoque
$router->get('/api/listarSaida','SaidaController@listarSaida');
$router->post('/api/saidaEstoque','SaidaController@saidaEstoque');
$router->delete('/api/delSaida/{id}','SaidaController@deletarSaida');
$router->post('/api/atualizarSaida/{id}','SaidaController@atualizarSaida');

//Rota Caixa
$router->get('/api/saldoTotal','CaixaController@saldoTotal');
$router->post('/api/EntradaCaixa','CaixaController@entradaCaixa');

//Rota Usuário
$router->get('/api/todosUsuarios','UsuarioController@mostrarTodosUsuarios');
$router->post('/api/cadastrarUsuarios','UsuarioController@cadastrarUsuario');
$router->get('/api/mostrarUmUsuario/{id}','UsuarioController@mostrarUmUsuario');
$router->post('/api/atualizarUsuarios/{id}','UsuarioController@atualizarUsuario');
$router->delete('/api/deletarUsuario/{id}','UsuarioController@deletar');

//Rota Login
$router->post('/login','UsuarioController@usuarioLogin');
$router->post('/info' ,'UsuarioController@mostrarUsuarioAutenticado');
$router->post('/logout','UsuarioController@usuarioLogout');