<?php
/**
 * Class for database exceptions
 */

namespace core\exceptions;


use Exception;

class DatabaseException extends Exception
{
    /**
     * DatabaseException constructor
     *
     * @param string $string
     * @param int $E_USER_ERROR
     */
    public function __construct($string, $E_USER_ERROR)
    {
    }
}