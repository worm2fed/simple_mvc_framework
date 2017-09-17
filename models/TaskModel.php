<?php

namespace models;


use Config;
use core\DatabaseHandler;
use core\exceptions\DatabaseException;
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
     * Find tasks
     *
     * @param array $where
     * @param array $args
     * @return array
     */
    public static function find(array $where = [], array $args = [])
    : array {
        $params = '';
        if (!empty($args)) {
            // Add sort
            if (isset($args['order_by'])) {
                $params = ' ORDER BY ' . $args['order_by'];
            }
            // Add pagination
            if (isset($args['page']) and $args['page'] > 1) {
                $params .= ' LIMIT ' . Config::PAGINATION_LIMIT * ($args['page'] - 1) . ', ' . Config::PAGINATION_LIMIT;
            } else {
                $params .= ' LIMIT ' . Config::PAGINATION_LIMIT;
            }
        }
        return DatabaseHandler::selectFromTable(self::getTableName(), $where, $params);
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
            $user->password = sha1($this->email);
            $user->create();
        } catch (ModelException $e) {
        }
    }
}