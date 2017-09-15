<?php
/**
 * Class for database exceptions
 */

namespace core\exceptions;


use Exception;

class DatabaseException extends Exception
{
    protected $message = 'Unknown exception';
    protected $code = E_USER_ERROR;

    /**
     * DatabaseException constructor
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