<?php

/**
 * Base class for model
 */
abstract class Model
{
    protected $table_name   = '';
    protected $fields       = [];
    protected $validators   = [];
    protected $errors       = [];

    public function __construct()
    {
    }

    public function getFields()
    {

    }

    public function isFieldRequired()
    {

    }

    public function getValidators()
    {

    }

    public function validate()
    {

    }

    public function getErrors()
    {

    }

    public function load()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
