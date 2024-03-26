<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tela','Home::telinha');
$routes->get('/cadastro','Home::cadastro');
$routes->get('/formulario','Home::apresenta_formulario');
$routes->post('/formreceivedata','Home::receiveData');
$routes->get('/delete/(:num)','Home::deletarItemPorURL/$1');
$routes->post('/delete','Home::deletarItem');
$routes->post('/editform','Home::editarItem');
$routes->post('/formupdatedata','Home::updateData');
$routes->post('/pesquisar','Home::pesquisar');
$routes->get('/login','Home::login');
$routes->post('/menu','Home::menuUser');