<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::index');

//$routes->get('/', 'Page::about');

//$routes->setAutoRoute(true);
$routes->get('/Books/(:segment)', 'Books::detail/$1');
