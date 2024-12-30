<?php 

namespace Core\MiddleWare ;

class Auth
{
    public function handle()
    {
        if (! $_SESSION['user']?? false) {
            header('location: /');
            die();
        }
    }
}