<?php
/**
 * Created by PhpStorm.
 * User: worm2fed
 * Date: 16.09.17
 * Time: 20:19
 */

namespace models;


use Config;
use core\DatabaseHandler;
use core\exceptions\AuthenticationException;
use core\Model;
use core\SystemTools;

/**
 * Class UserModel provides user model and method for authentication
 * @package models
 */
class UserModel extends Model
{
    public function __construct()
    {
        // Set fields
        $this->_fields = array_fill_keys([
            'user_id', 'username', 'password', 'is_admin', 'hash'
        ], null);
        // Specify required fields
        $this->_required = ['username', 'password'];
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

    protected function beforeCreate()
    : void {
        $this->password = sha1(SystemTools::translit($this->username));
        $this->is_admin = 0;
    }

    /**
     * Check is user logged in
     *
     * @return bool
     */
    public static function isGuest()
    : bool{
        // Check is hash and user id are set
        if (isset($_COOKIE['_user_hash']) and isset($_SESSION['_user_id'])) {
            // Check salt
            if ($_SESSION['_user_salt'] != sha1(crypt($_SESSION['_user_id'], $_COOKIE['_user_hash']))) {
                return false;
            } else {
                // Get user data
                $user_data = DatabaseHandler::selectFromTable(self::getTableName(),
                    ['user_id' => $_SESSION['_user_id']], null, true);
                // Check
                if (($user_data['_user_hash'] != $_COOKIE['_user_hash']) or
                    ($user_data['_user_id'] != $_SESSION['_user_id'])) {
                    self::logout();
                    return false;
                } else {
                    return true;
                }
            }
        } else {
            return false;
        }
    }

    /**
     * Login user
     *
     * @param string $username
     * @param string $password
     * @throws AuthenticationException
     */
    public static function login(string $username, string $password)
    : void {
        // If user already logged in
        if (!self::isGuest()) {
            throw new AuthenticationException('`You are already logged in`', E_USER_ERROR);
        }
        // Look for user in database
        if (DatabaseHandler::countEntry(self::getTableName(), 'user_id', ['username' => $username]) !== 1) {
            throw new AuthenticationException('`There are no such user in database`', E_USER_ERROR);
        }
        // Load user data
        $user_data = new self();
        $user_data->load(['username' => $username, 'password' => sha1($password)], true);
        // Set up hash code
        $user_data->hash = SystemTools::generate_hash_code(10);
        // Save hash to database
        $user_data->update();
        // Login
        $time = time() + 3600 * Config::SESSION_TIME;
        setCookie('_user_hash', $user_data->hash, $time);
        // Set session values
        $_SESSION['_user_id'] = $user_data->user_id;
        $_SESSION['_user_salt'] = sha1(crypt($user_data->user_id, $user_data->hash));
    }

    /**
     * Logout user
     */
    public static function logout()
    : void {
        setCookie('_user_hash', '', time() -3600 * Config::SESSION_TIME, '');
        session_unset();
        session_destroy();
    }
}