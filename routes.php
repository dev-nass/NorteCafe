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