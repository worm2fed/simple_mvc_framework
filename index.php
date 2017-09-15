<?php
/**
 * @file This file is an entry point to app
 */

use core\ErrorHandler;


// Plug Config and Loader
require_once 'Config.php';
require_once 'core/Loader.php';

// Register autoloader
spl_autoload_register('core\Loader::autoload');
// Set error handler
new ErrorHandler();
