<?php

namespace core;


use core\exceptions\ModelException;

/**
 * Class Model is base class for all models
 * @package core
 */
abstract class Model
{
    protected $_fields;
    protected $_required;

    /**
     * Check whether fields were set
     *
     * @throws ModelException
     */
    private function check_is_fields_set()
    :void {
        if (empty($this->_fields)) {
            throw new ModelException('`This model does not have fields`', E_USER_ERROR);
        }
    }

    /**
     * Get record id
     *
     * @return int
     * @throws ModelException
     */
    public function getId()
    : int {
        $id_field = $this->getTableName().'_id';
        if (isset($id_field, $this->_fields)) {
            return $this->_fields[$id_field];
        } else {
            throw new ModelException('`You must specify record id at first`', E_USER_ERROR);
        }
    }

    /**
     * Load model from array or database
     *
     * @param array $data
     * @param bool $from_db
     */
    public function load(array $data, bool $from_db = false)
    :void {
        // If loading from database
        if ($from_db) {
            $data = DatabaseHandler::selectFromTable($this->getTableName(), $this->getTableName().'_id',
                current($data), null, true);
        }
        // This is need to protect $_fields form loosing field name
        if (!empty($data)) {
            foreach ($data as $field => $value) {
                $this->_fields[$field] = $value;
            }
        }
    }

    /**
     * Set model field value
     *
     * @param $field
     * @param $value
     * @return mixed
     */
    public function __set($field, $value)
    {
        return $this->_fields[$field] = $value;
    }

    /**
     * Get model field value
     *
     * @param $field
     * @return mixed
     * @throws ModelException
     */
    public function __get($field)
    {
        $this->check_is_fields_set();
        return array_key_exists($field, $this->_fields) ? $this->_fields[$field] : null;
    }

    /**
     * Get table name
     *
     * @return string
     */
    abstract public static function getTableName():string;

    /**
     * Validate fields
     */
    abstract public function validate():void;

    /**
     * Create a record
     */
    public function create()
    :void {
        $this->check_is_fields_set();
        $this->validate();
        DatabaseHandler::insertToTable($this->getTableName(), $this->_fields);
    }

    /**
     * Update a record
     */
    public function update()
    :void {
        $this->check_is_fields_set();
        $this->validate();
        DatabaseHandler::updateInTable($this->getTableName(), $this->_fields, $this->getTableName().'_id',
            $this->getId());
    }

    /**
     * Delete a record
     */
    public function delete()
    :void {
        $this->check_is_fields_set();
        DatabaseHandler::deleteFromTable($this->getTableName(), $this->getTableName().'_id', $this->getId());
    }
}
