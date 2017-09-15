<?php
/**
 * Class for validation exceptions
 */

namespace core\exceptions;


use Exception;

class ValidationException extends Exception
{
    protected $message = 'Unknown exception';
    protected $code = E_USER_ERROR;
    /**
     * ValidationException constructor
     *
     * @param string $message
     * @param int $code
     */
    public function __construct($message, $code)
    {
        $this->message = $message;
        $this->code = $code;
    }
}