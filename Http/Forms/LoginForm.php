<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    public $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Provide a valid email';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Provide a valid password';
        }

        return empty($this->errors);
    }

    public function AddError($key, $value)
    {
        $this->errors[$key] = $value;
    }

}
