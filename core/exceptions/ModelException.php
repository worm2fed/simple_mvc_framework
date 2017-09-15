<?php
/**
 * Class for model exceptions
 */

namespace exceptions;


use Exception;

class ModelException extends Exception
{
    /**
     * ModelException constructor
     *
     * @param string $string
     * @param int $E_USER_ERROR
     */
    public function __construct($string, $E_USER_ERROR)
    {
    }
}