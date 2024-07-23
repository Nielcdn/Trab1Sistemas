<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu','Home::telinha');
$routes->get('/cadastro','Home::formCadastro');
$routes->get('/login','Home::formLogin');
$routes->post('/formRecebeCadastro','Home::recebeCadastro');
$routes->post('/formRecebeLogin','Home::recebeLogin');
$routes->get('/delete/(:num)','Home::deletarItemPorURL/$1');
$routes->post('/delete','Home::deletarItem');
$routes->post('/editform','Home::editarItem');
$routes->post('/formupdatedata','Home::updateData');
$routes->post('/pesquisar','Home::pesquisar');
