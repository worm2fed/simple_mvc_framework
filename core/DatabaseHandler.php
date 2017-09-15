<?php
/**
 * This class provides interaction with database
 */

namespace core;


use Config;
use mysqli;
use mysqli_sql_exception;

class DatabaseHandler
{
    // Stores instance of handler
    private static $_mHandler;

    // private-construct do not allow to create instances directly
    private function __construct()
    {
    }

    /**
     * Initialise database descriptor
     *
     * @return mysqli
     */
    private static function getHandler()
    : mysqli {
        // Create connection iff it doesn't exist
        if (is_null(self::$_mHandler)) {
            try {
                // Create new instance
                self::$_mHandler = new mysqli(Config::SQL_HOST, Config::SQL_USER, Config::SQL_PASS, Config::SQL_DB);
                // Set connection charset
                self::$_mHandler->set_charset("utf8");
            } catch (mysqli_sql_exception $e) {
                // Close descriptor and generate error
                self::closeConnection();
                trigger_error($e->getMessage(), E_USER_ERROR);
            }
        }
        return self::$_mHandler;
    }

    /**
     * Clear instance and close connection
     */
    private static function closeConnection()
    : void {
        self::$_mHandler = null;
    }

    /**
     * Execute SQL-query
     *
     * @param string $sqlQuery
     * @return bool
     */
    private static function executeQuery(string $sqlQuery)
    : bool {
        try {
            // Get database descriptor
            $database_handler = self::getHandler();
            // Prepare query
            $statement_handler = $database_handler->prepare($sqlQuery);
            // Execute query
            return $statement_handler->execute();
        } catch (mysqli_sql_exception $e) {
            self::closeConnection();
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
    }

    /**
     * Get data form database
     *
     * @param string $sqlQuery
     * @return array
     */
    private static function getData(string $sqlQuery)
    : array {
        try {
            $database_handler = self::getHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute();

            // Get result
            $get_result = $statement_handler->get_result();
            $result = $get_result->fetch_all(MYSQLI_ASSOC);
            $result['num_rows'] = $get_result->num_rows;
        } catch (mysqli_sql_exception $e) {
            self::closeConnection();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        return $result ?? array();
    }

    /**
     * Get row from database
     *
     * @param string $sqlQuery
     * @return array
     */
    private static function getRow(string $sqlQuery)
    : array {
        try {
            $database_handler = self::getHandler();
            $statement_handler = $database_handler->prepare($sqlQuery);
            $statement_handler->execute();
            $get_result = $statement_handler->get_result();
            $result = $get_result->fetch_assoc();
        } catch (mysqli_sql_exception $e) {
            self::closeConnection();
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
        return $result ?? array();
    }

    /**
     * Delete item from table
     *
     * @param string $table_name
     * @param string $where_field
     * @param string $where_value
     * @return bool
     */
    public static function deleteFromTable(string $table_name, string $where_field, string $where_value)
    : bool {
        // Compile query
        $sqlQuery = "DELETE FROM $table_name WHERE $where_field='$where_value'";
        return self::executeQuery($sqlQuery);
    }

    /**
     * Count entries in table
     *
     * @param string $table_name
     * @param string $count_field
     * @param string $where_field
     * @param string $where_value
     * @return int
     */
    public static function countEntry(string $table_name, string $count_field, string $where_field, string $where_value)
    : int {
        $sqlQuery = "SELECT COUNT($count_field) AS num FROM $table_name WHERE $where_field='$where_value'";
        return self::executeQuery($sqlQuery)['num'];
    }

    /**
     * Insert record to table
     *
     * @param string $table_name
     * @param array $data
     * @return bool
     */
    public static function insertToTable(string $table_name, array $data)
    : bool {
        // Split $data to columns and values
        $columns = array_keys($data);
        $values = array_values($data);
        $sqlQuery = "INSERT INTO $table_name (";
        // Add columns to query
        foreach ($columns as $column) {
            $sqlQuery .= $column .', ';
        }
        // Remove comma and space from the end
        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= ") VALUES (";
        // Add values to query
        foreach ($values as $value) {
            $sqlQuery .= is_null($value) ? 'null, ' : "'$value', ";
        }
        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= ")";
        return self::executeQuery($sqlQuery);
    }

    /**
     * Select all data from table
     *
     * @param string $table_name
     * @param string $where_field
     * @param string $where_value
     * @param string|null $params
     * @param bool $only_row
     * @return array
     */
    public static function selectFromTable(string $table_name, string $where_field, string $where_value,
                                           string $params = null, bool $only_row = false)
    : array {
        $sqlQuery = "SELECT * FROM $table_name WHERE $where_field='$where_value' $params";
        return $only_row ? self::getRow($sqlQuery) : self::getData($sqlQuery);
    }

    /**
     * Update data in table
     *
     * @param string $table
     * @param array $data
     * @param string $where_field
     * @param string $where_value
     * @return bool
     */

    public static function updateInTable(string $table, array $data, string $where_field, string $where_value)
    : bool {
        $sqlQuery = "UPDATE $table SET ";
        foreach ($data as $column => $value) {
            $sqlQuery .= "$column='$value', ";
        }
        $sqlQuery = substr($sqlQuery, 0, -2);
        $sqlQuery .= " WHERE $where_field='$where_value'";
        return self::executeQuery($sqlQuery);
    }
}
