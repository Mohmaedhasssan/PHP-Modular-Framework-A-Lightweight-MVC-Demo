<?php

namespace Http\Forms;

class Form
{
    protected  $errors = [];

    public  function validate($email, $password)
    {
        // This method should be overridden in child classes
        throw new \Exception("Validate method not implemented");
    }

    public function errors()
    {
        return $this->errors;
    }
}