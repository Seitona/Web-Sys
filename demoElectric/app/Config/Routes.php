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
$routes->get('/accounts/(:num)', 'Accounts::show/$1');
$routes->get('/account/(:num)', 'Accounts::show/$1');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index'); 
$routes->match(['get', 'post'], '/contact', 'Contact::index'); 
$routes->get('/register', 'Register::index'); 
$routes->post('/register', 'Register::create'); 
