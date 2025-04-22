<?php

$router->get('test', 'TestController', 'index');
$router->post('test-store', 'TestController', 'store');

/**
 * General Web-Pages
*/
$router->get('index', 'Customer\UserController', 'index')->only('general', 'Customer');
$router->get('contactUs', 'Customer\UserController', 'contactUs');
$router->post('contactUs', 'Customer\UserController', 'sendMessage');
$router->get('aboutUsNorteCafe', 'Customer\UserController', 'aboutUsNorteCafe');
$router->get('aboutUsDevelopers', 'Customer\UserController', 'aboutUsDevelopers');
$router->get('findStore', 'Customer\UserController', 'findStore');
$router->get('faqs', 'Customer\UserController', 'faqs');
$router->get('delivery-details', 'Customer\UserController', 'deliveryDetails');

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
$router->get('reset-pass', 'ForgotPasswordController', 'create');
$router->post('reset-pass', 'ForgotPasswordController', 'update');
// Change Password
$router->get('change-pass', 'ChangePasswordController', 'create');
$router->post('change-pass', 'ChangePasswordController', 'store');

/**
 * HTTP Response Web Page
*/
$router->get('403', 'ResponseController', 'http_403');

/**
 * Specific Web Pages
*/
$router->get('search-filter', 'Customer\FilterController', 'search');
$router->get('category-filter', 'Customer\FilterController', 'category');

$router->get('menu', 'Customer\MenuController', 'index')->only('auth', 'Customer');

$router->get('cart', 'Customer\CartController', 'index')->only('auth', 'Customer');
$router->post('cart-store', 'Customer\CartController', 'store');
$router->post('cart-update', 'Customer\CartController', 'update');
$router->post('cart-delete', 'Customer\CartController', 'delete');

$router->post('order-store', 'Customer\OrderController', 'store');


/**
 * Profiling
*/
$router->get('profile', 'Customer\ProfileController', 'index')->only('auth', 'Customer');
$router->post('profile', 'Customer\ProfileController', 'update');

/**
 * Customer Transsaction
*/
$router->get('current-transactions', 'Customer\TransactionController', 'currentTransactions')->only('auth', 'Customer');
$router->get('previous-transactions', 'Customer\TransactionController', 'previousTransactions')->only('auth', 'Customer');
$router->get('transaction-show', 'Customer\TransactionController', 'show')->only('auth', 'Customer');
$router->post('transaction-update', 'Customer\TransactionController', 'update')->only('auth', 'Customer');


/**
 * Admin side 
*/
$router->get('transaction-queue-admin', 'Admin\Admin_TransactionController', 'queue');
$router->get('transaction-pending-show-admin', 'Admin\Admin_TransactionController', 'pending_show');
$router->get('transaction-show-admin', 'Admin\Admin_TransactionController', 'show')->only('auth', 'Admin');
$router->post('transaction-update-admin', 'Admin\Admin_TransactionController', 'update')->only('auth', 'Admin'); // (Admin/transactions/pending-show) change status "Approved" or "Rejected"
$router->post('transaction-assign-admin', 'Admin\Admin_TransactionController', 'assign')->only('auth', 'Admin');
$router->get('transaction-table-admin', 'Admin\Admin_TransactionController', 'table');
$router->post('transaction-archive-admin', 'Admin\Admin_TransactionController', 'delete');

$router->get('menu-upload-admin', 'Admin\Admin_MenuController', 'create');
$router->post('menu-store-admin', 'Admin\Admin_MenuController', 'store');
$router->get('menu-table-admin', 'Admin\Admin_MenuController', 'table');
$router->get('menu-show-admin', 'Admin\Admin_MenuController', 'show');
$router->post('menu-update-admin', 'Admin\Admin_MenuController', 'update');
$router->post('menu-change-availability-admin', 'Admin\Admin_MenuController', 'change_availability');

$router->get('size-upload-admin', 'Admin\Admin_MenuSizeController', 'create');
$router->post('size-store-admin', 'Admin\Admin_MenuSizeController', 'store');

$router->get('add-ons-table-admin', 'Admin\Admin_AddOnsController', 'index');
$router->get('add-ons-upload-admin', 'Admin\Admin_AddOnsController', 'create');
$router->post('add-ons-upload-admin', 'Admin\Admin_AddOnsController', 'store');

$router->get('customer-table-admin', 'Admin\Admin_CustomerController', 'table');
$router->get('customer-show-admin', 'Admin\Admin_CustomerController', 'show');