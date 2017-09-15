<?php

namespace core;


use Config;

/**
 * Class SystemTools provides different tools
 * @package core
 */
class SystemTools
{
    private function __construct()
    {
    }

    /**
     * Get error type by its level
     * @param int $level
     * @return string
     */
    public static function get_error_type(int $level)
    : string {
        if (array_key_exists($level, Config::$ERROR_LEVELS)) {
            return Config::$ERROR_LEVELS[$level];
        } else {
            return 'E_UNKNOWN';
        }
    }

    /**
     * Generate hash-code
     *
     * @param int $length
     * @return string
     */
    public static function generate_hash_code(int $length = 6)
    : string {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $len = strlen($chars) - 1;

        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $len)];
        }
        return $code;
    }
}
