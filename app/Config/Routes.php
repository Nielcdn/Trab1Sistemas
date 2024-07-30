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
$routes->get('/delete/(:num)','Home::deletarItemPorURL/$1');
$routes->post('/delete','Home::deletarItem');
$routes->post('/editform','Home::editarItem');
$routes->post('/formupdatedata','Home::updateData');
$routes->post('/pesquisar','Home::pesquisar');
