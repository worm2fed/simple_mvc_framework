<?php

namespace core;


use Config;
use core\exceptions\ViewException;

/**
 * Class View
 * @package core
 */
class View
{
    /**
     * Render a view
     *
     * @param string $view
     * @param array $data
     * @return void
     * @throws ViewException
     */
    public static function render(string $view, array $data = [])
    : void {
        extract($data, EXTR_SKIP);
        $file = Config::ROOT_DIR . "/views/$view";
        if (file_exists($file)) {
            require $file;
        } else {
            throw new ViewException("`View $file was not found`", E_ERROR);
        }
    }
}