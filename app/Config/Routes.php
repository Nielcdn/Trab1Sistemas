<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu','Home::telinha');
$routes->get('/cadastro','Home::formCadastro');
$routes->get('/login','Home::formLogin');
$routes->get('/logout','Home::formLogout');
$routes->get('/addLivro','Home::formLivro');
$routes->post('/formRecebeCadastro','Home::recebeCadastro');
$routes->post('/formRecebeLogin','Home::recebeLogin');
$routes->post('/formRecebeLivro','Home::recebeLivro');
$routes->get('/adm','Home::admin');
$routes->get('/pegar/(:num)','Home::pegarItem/$1');
$routes->get('/devolver/(:num)','Home::devolverItem/$1');
$routes->post('/deleteUsuario','Home::deletarUsuario');
$routes->post('/editUsuario','Home::editarUsuario');
$routes->post('/updateUsuario','Home::updateUsuario');
$routes->post('/deleteLivro','Home::deletarLivro');
$routes->post('/editLivro','Home::editarLivro');
$routes->post('/updateLivro','Home::updateLivro');
$routes->post('/pesquisar','Home::pesquisar');