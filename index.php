<?php

/**
 * @file This file is an entry point to app
 */

use core\ErrorHandler;
use core\Router;
use core\SessionHandler;

// Plug Config and Loader
require_once 'Config.php';
require_once 'core/Loader.php';

// Register autoloader
spl_autoload_register('core\Loader::autoload');
// Set error handler
new ErrorHandler();
// Start session
$session = SessionHandler::getInstance();
// Create router
$router = new Router();
// Add routes
$router->registerRoute('login', ['controller' => 'TaskController', 'action' => 'login']);
$router->registerRoute('logout', ['controller' => 'TaskController', 'action' => 'logout']);

$router->registerRoute('', ['controller' => 'TaskController', 'action' => 'index']);
$router->registerRoute('create', ['controller' => 'TaskController', 'action' => 'create']);
// Start routing
$router->dispatch($_SERVER['QUERY_STRING']);
echo isset($session->_user_salt) ? $session->_user_salt : 'ops';