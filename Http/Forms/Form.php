<?php

namespace Http\Forms;

class Form
{
    protected  $errors = [];

    public static function validate($attributes)
    {
        // This method should be overridden in child classes
        throw new \Exception("Validate method not implemented");
    }

    public function errors()
    {
        return $this->errors;
    }
}