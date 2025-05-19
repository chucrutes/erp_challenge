<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProductController');
$routes->post('products/create', 'ProductController::insert');
$routes->post('products/delete/(:num)', 'ProductController::delete/$1');
$routes->get('/orders', 'OrderController');
$routes->get('/coupons', 'CouponController');
$routes->post('coupons', 'CouponController::insert');
