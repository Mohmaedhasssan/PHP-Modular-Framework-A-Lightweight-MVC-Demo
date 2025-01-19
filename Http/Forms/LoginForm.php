<?php

namespace Http\Forms;

use Core\Validation\Validator;
use Core\Validation\ValidationException;

class LoginForm extends Form
{
    public $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Provide a valid email';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Provide a valid password';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->hasErrors() ? $instance->throw() : $instance;
    }
    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function errors()
    {
        return $this->errors;
    }
    public function hasErrors()
    {
        return count($this->errors) > 0;
    }

    public function AddError($key, $value)
    {
        $this->errors[$key] = $value;
        return $this;
    }
}
