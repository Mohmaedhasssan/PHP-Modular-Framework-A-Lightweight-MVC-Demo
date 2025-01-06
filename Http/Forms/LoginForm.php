<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{
    public static function validate($email, $password)
    {
        if (!Validator::email($email)) {
            self::$errors['email'] = 'Provide a valid email';
        }

        if (!Validator::string($password)) {
            self::$errors['password'] = 'Provide a valid password';
        }

        return empty(self::$errors) ;
    }

}
