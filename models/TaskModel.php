<?php

namespace models;


use core\exceptions\ValidationException;
use core\Model;

/**
 * Class TaskModel
 * @package models
 */
class TaskModel extends Model
{
    public function __construct()
    {
        // Set fields
        $this->_fields = array_fill_keys([
            'task_id', 'status', 'name', 'email', 'text', 'image'
        ], null);
        // Specify required fields
        $this->_required = ['name', 'email', 'text'];
        // Specify default values
        $this->status = 0;
    }

    /**
     * Get table name
     *
     * @return string
     */
    public static function getTableName()
    : string {
        return 'task';
    }

    /**
     * Validate fields
     */
    public function validate()
    : void {
        // Check whether required fields are set
        foreach ($this->_required as $required) {
            if (!isset($this->_fields[$required])) {
                throw new ValidationException("`$required can not be blank`", E_USER_ERROR);
            }
        }
        // Validate email address
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("`email has wrong format`", E_USER_ERROR);
        }
    }
}