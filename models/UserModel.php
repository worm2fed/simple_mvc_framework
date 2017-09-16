<?php
/**
 * Created by PhpStorm.
 * User: worm2fed
 * Date: 16.09.17
 * Time: 20:19
 */

namespace models;


use core\Model;

class UserModel extends Model
{
    public function __construct()
    {
        // Set fields
        $this->_fields = array_fill_keys([
            'user_id', 'username', 'password', 'is_admin'
        ], null);
        // Specify required fields
        $this->_required = ['username', 'password', 'is_admin'];
    }

    /**
     * Get table name
     *
     * @return string
     */
    public static function getTableName()
    : string {
        return 'user';
    }
}