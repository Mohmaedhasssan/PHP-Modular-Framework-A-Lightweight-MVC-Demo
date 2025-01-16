<?php

namespace Demo\Core;

use Core\App;
use Core\Database;

class Authenticator
{
    public function attempt($password, $email)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if (! $user || ! password_verify($password, $user['password'])) {
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
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
}
