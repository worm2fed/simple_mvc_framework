<?php

namespace models;


use core\exceptions\ModelException;
use core\exceptions\ValidationException;
use core\Model;
use core\SystemTools;

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
            'task_id', 'status', 'username', 'email', 'text', 'image', 'published'
        ], null);
        // Specify required fields
        $this->_required = ['username', 'email', 'text'];
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

    protected function beforeCreate()
    : void {
        $this->status = 0;
        $this->published = date('Y-m-d H:m:s', time());
        // Create user
        try {
            $user = new UserModel();
            $user->username = $this->email;
            $user->password = sha1(SystemTools::translit($this->username));
            $user->create();
        } catch (ModelException $e) {
        }
    }
}