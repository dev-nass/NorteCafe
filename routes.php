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
$router->get('reset-pass', 'ResetPasswordController', 'create');
$router->post('reset-pass', 'ResetPasswordController', 'update');
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
$router->get('search-filter', 'Customer\FilterController', 'search')->only('auth', 'Customer');
$router->get('category-filter', 'Customer\FilterController', 'category')->only('auth', 'Customer');

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
$router->get('dashboard', 'Admin\Admin_DashboardController', 'index')->only('staff', 'Admin,Employee');
$router->get('dashboard-analytics', 'Admin\Admin_DashboardController', 'admin_dashboard');
$router->get('total-transactions', 'Admin\Admin_DashboardController', 'total_transactions');
$router->get('top-sales', 'Admin\Admin_DashboardController', 'top_sales');
$router->post('backup', 'Admin\Admin_DashboardController', 'backup_db');

$router->get('generate-report', 'Admin\Admin_GenerateReportController', 'create');
$router->post('generate-report', 'Admin\Admin_GenerateReportController', 'generate');

$router->get('transaction-queue-admin', 'Admin\Admin_TransactionController', 'queue');
$router->get('transaction-pending-show-admin', 'Admin\Admin_TransactionController', 'pending_show');
$router->get('transaction-show-admin', 'Admin\Admin_TransactionController', 'show')->only('auth', 'Admin');
$router->post('transaction-update-admin', 'Admin\Admin_TransactionController', 'update')->only('auth', 'Admin'); // (Admin/transactions/pending-show) change status "Approved" or "Rejected"
$router->post('transaction-reject-all-admin', 'Admin\Admin_TransactionController', 'reject_all')->only('auth', 'Admin'); // (Admin/transactions/pending-show) change status to "Rejected" (all pending)
$router->post('transaction-assign-admin', 'Admin\Admin_TransactionController', 'assign')->only('auth', 'Admin');
$router->get('transaction-table-admin', 'Admin\Admin_TransactionController', 'index');
$router->post('transaction-archive-admin', 'Admin\Admin_TransactionController', 'delete');

$router->get('menu-table-admin', 'Admin\Admin_MenuController', 'index');
$router->get('menu-show-admin', 'Admin\Admin_MenuController', 'show');
$router->get('menu-create-admin', 'Admin\Admin_MenuController', 'create');
$router->post('menu-store-admin', 'Admin\Admin_MenuController', 'store');
$router->post('menu-update-admin', 'Admin\Admin_MenuController', 'update');
$router->post('menu-delete-admin', 'Admin\Admin_MenuController', 'delete');
$router->post('menu-change-availability-admin', 'Admin\Admin_MenuController', 'change_availability');

$router->get('size-create-admin', 'Admin\Admin_MenuSizeController', 'create');
$router->post('size-store-admin', 'Admin\Admin_MenuSizeController', 'store');

$router->get('add-ons-table-admin', 'Admin\Admin_AddOnsController', 'index');
$router->get('add-ons-show-admin', 'Admin\Admin_AddOnsController', 'show');
$router->get('add-ons-create-admin', 'Admin\Admin_AddOnsController', 'create');
$router->post('add-ons-store-admin', 'Admin\Admin_AddOnsController', 'store');
$router->post('add-ons-update-admin', 'Admin\Admin_AddOnsController', 'update');
$router->post('add-ons-delete-admin', 'Admin\Admin_AddOnsController', 'delete');
$router->post('add-ons-change-availability-admin', 'Admin\Admin_AddOnsController',  'change_availability');

$router->get('discount-table-admin', 'Admin\Admin_DiscountController', 'index');
$router->get('discount-show-admin', 'Admin\Admin_DiscountController', 'show');
$router->get('discount-create-admin', 'Admin\Admin_DiscountController', 'create');
$router->post('discount-store-admin', 'Admin\Admin_DiscountController', 'store');
$router->post('discount-update-admin', 'Admin\Admin_DiscountController', 'update');
$router->post('discount-delete-admin', 'Admin\Admin_DiscountController', 'delete');

$router->get('customer-table-admin', 'Admin\Admin_CustomerController', 'index');
$router->get('customer-show-admin', 'Admin\Admin_CustomerController', 'show');
$router->post('customer-delete-admin', 'Admin\Admin_CustomerController', 'delete');

$router->get('employee-table-admin', 'Admin\Admin_EmployeeController', 'index');
$router->get('employee-show-admin', 'Admin\Admin_EmployeeController', 'show');
$router->get('employee-create-admin', 'Admin\Admin_EmployeeController', 'create');
$router->post('employee-store-admin', 'Admin\Admin_EmployeeController', 'store');
$router->post('employee-update-admin', 'Admin\Admin_EmployeeController', 'update');
$router->post('employee-delete-admin', 'Admin\Admin_EmployeeController', 'delete');

$router->get('staff-create-employee', 'Admin\Admin_StaffController', 'createEmployee');
$router->get('staff-create-rider', 'Admin\Admin_StaffController', 'createRider');
$router->post('staff-store', 'Admin\Admin_StaffController', 'store');

$router->get('rider-table-admin', 'Admin\Admin_RiderController', 'index');
$router->get('rider-show-admin', 'Admin\Admin_RiderController', 'show');
$router->get('rider-create-admin', 'Admin\Admin_RiderController', 'create');
$router->post('rider-store-admin', 'Admin\Admin_RiderController', 'store');
$router->post('rider-update-admin', 'Admin\Admin_RiderController', 'update');
$router->post('rider-delete-admin', 'Admin\Admin_RiderController', 'delete');

$router->get('profile-admin', 'Admin\Admin_ProfileController', 'index');
$router->post('profile-update-admin', 'Admin\Admin_ProfileController', 'update');


/**
 * Rider Side
*/
$router->get('assigned-transaction-queue-rider', 'Rider\Rider_TransactionController', 'queue');
$router->get('fetch-assigned-transaction', 'Rider\Rider_TransactionController', 'assignedTrans'); // API
$router->get('assigned-transaction-rider', 'Rider\Rider_TransactionController', 'assigned_show');
$router->post('transaction-update-rider', 'Rider\Rider_TransactionController', 'update');
$router->post('transaction-reject-all-rider', 'Rider\Rider_TransactionController', 'reject_all');

$router->get('current-transaction-queue-rider', 'Rider\Rider_TransactionController', 'current_queue');
$router->get('transaction-show-rider', 'Rider\Rider_TransactionController', 'show');
$router->post('transaction-calculate-change', 'Rider\Rider_TransactionController', 'calculateChange');

$router->get('delivered-transaction-queue-rider', 'Rider\Rider_TransactionController', 'delivered_queue');

$router->get('contact-shop-rider', 'Rider\Rider_ContactShopController', 'index');
$router->post('contact-shop-send-rider', 'Rider\Rider_ContactShopController', 'sendMessageRider');

$router->get('profile-rider', 'Rider\Rider_ProfileController', 'index');
$router->post('profile-update-rider', 'Rider\Rider_ProfileController', 'update');