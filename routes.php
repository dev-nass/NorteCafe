<?php

/**
 * General Web-Pages
*/
$router->get('index', 'UserController', 'index');
$router->get('contactUs', 'UserController', 'contactUs');
$router->get('aboutUsNorteCafe', 'UserController', 'aboutUsNorteCafe');
$router->get('aboutUsDevelopers', 'UserController', 'aboutUsDevelopers');
$router->get('faqs', 'UserController', 'faqs');

/**
 * Auth Web Pages
*/
$router->get('registration', 'RegistrationController', 'create');
$router->post('registration', 'RegistrationController', 'store');
$router->get('login', 'LoginController', 'create');
$router->post('login', 'LoginController', 'store');

/**
 * Specific Web Pages
*/
$router->get('menu', 'MenuController', 'index');
$router->get('cart', 'CartController', 'index');
$router->post('cart-store', 'CartController', 'store');
$router->patch('cart-update', 'CartController', 'update');
$router->delete('cart-delete', 'CartController', 'destroy');

$router->post('order-store', 'OrderController', 'store');