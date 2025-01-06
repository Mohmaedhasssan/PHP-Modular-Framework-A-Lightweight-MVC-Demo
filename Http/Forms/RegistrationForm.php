<?php

namespace Http\Forms;

use Core\Validator;

class RegistrationForm extends Form
{   
    private $MinPasswordLength = 7;
    private $MaxPasswordLength = 255;

    public static function validate($email, $password)
    {
        if (!Validator::email($email)) {
            self::$errors['email'] = 'Provide a valid email';
        }

        if (!Validator::string($password, self::$MinPasswordLength, self::$MaxPasswordLength)) {
            self::$errors['password'] = 'Provide a valid password that is > 7 characters';
        }

        return empty(self::$errors) ;
    }

}
