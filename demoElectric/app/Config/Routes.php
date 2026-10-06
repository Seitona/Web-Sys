<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::attempt');
$routes->get('/logout', 'Login::logout');
$routes->get('/accounts', 'Accounts::index');
$routes->get('/accounts/create', 'Accounts::create');
$routes->post('/accounts', 'Accounts::store');
$routes->get('/accounts/(:num)', 'Accounts::show/$1');
$routes->get('/accounts/(:num)/edit', 'Accounts::edit/$1');
$routes->post('/accounts/(:num)', 'Accounts::update/$1');
$routes->post('/accounts/(:num)/delete', 'Accounts::delete/$1');
$routes->get('/account/(:num)', 'Accounts::show/$1');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index'); 
$routes->match(['get', 'post'], '/contact', 'Contact::index'); 
$routes->get('/register', 'Register::index'); 
$routes->post('/register', 'Register::create'); 
