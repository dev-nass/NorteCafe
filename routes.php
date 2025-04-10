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
$router->get('registration', 'RegistrationController', 'create')->only('guest');
$router->post('registration', 'RegistrationController', 'store');
$router->get('login', 'LoginController', 'create')->only('guest');
$router->post('login', 'LoginController', 'store');
$router->post('logout', 'LoginController', 'logout');
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

$router->get('menu', 'MenuController', 'index')->only('auth', 'Customer');
$router->get('cart', 'CartController', 'index')->only('auth', 'Customer');
$router->post('cart-store', 'CartController', 'store');
$router->patch('cart-update', 'CartController', 'update');
$router->delete('cart-delete', 'CartController', 'destroy');

$router->post('order-store', 'OrderController', 'store');


/**
 * Profiling
*/
$router->get('profile', 'ProfileController', 'index')->only('auth', 'Customer');
$router->post('profile', 'ProfileController', 'update');

/**
 * Customer Transsaction
*/
$router->get('current-transactions', 'TransactionController', 'currentTransactions')->only('auth', 'Customer');
$router->get('previous-transactions', 'TransactionController', 'previousTransactions')->only('auth', 'Customer');
$router->get('transaction-show', 'TransactionController', 'show')->only('auth', 'Customer');
$router->post('transaction-update', 'TransactionController', 'update')->only('auth', 'Customer');


/**
 * Admin side
*/
$router->get('transaction-queue-admin', 'Admin_TransactionController', 'queue');
$router->get('transaction-pending-show-admin', 'Admin_TransactionController', 'pending_show');
$router->get('transaction-show-admin', 'Admin_TransactionController', 'show')->only('auth', 'Admin');
$router->post('transaction-update-admin', 'Admin_TransactionController', 'update')->only('auth', 'Admin'); // (Admin/transactions/pending-show) change status "Approved" or "Rejected"
$router->post('transaction-assign-admin', 'Admin_TransactionController', 'assign')->only('auth', 'Admin');
$router->get('transaction-table-admin', 'Admin_TransactionController', 'table');
$router->post('transaction-archive-admin', 'Admin_TransactionController', 'delete');

$router->get('menu-upload-admin', 'Admin\Admin_MenuController', 'upload');
$router->post('menu-store-admin', 'Admin\Admin_MenuController', 'store');