<?php
/**
 * @file This file is an entry point to app
 */

use core\ErrorHandler;
use core\Router;

// Plug Config and Loader
require_once 'Config.php';
require_once 'core/Loader.php';

// Register autoloader
spl_autoload_register('core\Loader::autoload');
// Set error handler
new ErrorHandler();
// Create router
$router = new Router();
// Add routes
$router->registerRoute('', ['controller' => 'TaskController', 'action' => 'index']);
// Start routing
$router->dispatch($_SERVER['QUERY_STRING']);