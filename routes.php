<?php

/**
 * General Web-Pages
*/
$router->get('index', 'UserController', 'index');
$router->get('contactUs', 'UserController', 'contactUs');
$router->get('aboutUsNorteCafe', 'UserController', 'aboutUsNorteCafe');
$router->get('aboutUsDevelopers', 'UserController', 'aboutUsDevelopers');
$router->get('faqs', 'UserController', 'faqs');
$router->get('delivery-details', 'UserController', 'deliveryDetails');

/**
 * Auth Web Pages
*/
// Registration & Login
$router->get('registration', 'RegistrationController', 'create');
$router->post('registration', 'RegistrationController', 'store');
$router->get('login', 'LoginController', 'create');
$router->post('login', 'LoginController', 'store');
// Frogot and Reset Password 
$router->get('forgot-pass', 'ForgotPasswordController', 'index');
$router->post('forgot-pass', 'ForgotPasswordController', 'store');
$router->get('reset-pass', 'ForgotPasswordController', 'show');
$router->post('reset-pass', 'ForgotPasswordController', 'update');

/**
 * HTTP Response Web Page
*/
$router->get('403', 'ResponseController', 'http_403');

/**
 * Specific Web Pages
*/
$router->get('search-filter', 'FilterController', 'search');
$router->get('category-filter', 'FilterController', 'category');

$router->get('menu', 'MenuController', 'index')->only('auth');
$router->get('cart', 'CartController', 'index')->only('auth');
$router->post('cart-store', 'CartController', 'store');
$router->patch('cart-update', 'CartController', 'update');
$router->delete('cart-delete', 'CartController', 'destroy');

$router->post('order-store', 'OrderController', 'store');


/**
 * Profiling
*/
$router->get('profile', 'ProfileController', 'index');
$router->post('profile', 'ProfileController', 'update');

/**
 * Customer Transsaction
*/
$router->get('current-transactions', 'TransactionController', 'currentTransactions');
$router->get('previous-transactions', 'TransactionController', 'previousTransactions');


/**
 * Admin side
*/
$router->get('transaction-queue', 'Admin_TransactionController', 'queue');
$router->get('transaction-pending-show', 'Admin_TransactionController', 'pending_show');
$router->get('transaction-show', 'Admin_TransactionController', 'show');
$router->post('transaction-update', 'Admin_TransactionController', 'update');
$router->get('transaction-table', 'Admin_TransactionController', 'table');
$router->post('transaction-archive', 'Admin_TransactionController', 'delete');
