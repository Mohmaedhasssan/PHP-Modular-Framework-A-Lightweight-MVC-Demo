<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator
{
    public function attempt($attributes)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $attributes['email']
        ])->find();

        if (! $user || ! password_verify($attributes['password'], $user['password'])) {
           return false;
        }   
        
        $this->login($user);
        
        return true;
        
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
