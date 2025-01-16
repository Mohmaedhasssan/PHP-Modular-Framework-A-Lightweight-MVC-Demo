<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends Form
{   
    public $errors = [];
    private $MinPasswordLength = 7;
    private $MaxPasswordLength = 255;

    public function validate($email, $password)
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Provide a valid email';
        }

        if (!Validator::string($password, $this->MinPasswordLength, $this->MaxPasswordLength)) {
            $this->errors['password'] = 'Provide a valid password that is > 7 characters';
        }

        return empty($this->errors);
    }

}
