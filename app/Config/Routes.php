<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProductController');
$routes->get('/orders', 'OrderController');
$routes->post('products', 'ProductController::insert');
$routes->get('/coupons', 'CouponController');
$routes->post('coupons', 'CouponController::insert');
