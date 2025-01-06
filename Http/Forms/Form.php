<?php

namespace Http\Forms;

class Form
{
    protected static $errors = [];

    public static function validate($email, $password)
    {
        // This method should be overridden in child classes
        throw new \Exception("Validate method not implemented");
    }

    public static function errors()
    {
        return self::$errors;
    }
}