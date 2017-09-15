<?php
/**
 * @file This file is the application manager. Its only task is to accept the request (all user calls will go through
 * this file) and transfer it to the loader - loader.php
 */

// Display all errors (for dev)
ini_set('display_errors', 1);
// Plug loader
require_once 'loader.php';