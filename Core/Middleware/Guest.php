<?php 

namespace Core\MiddleWare ;

class Guest
{
    public function handle()
    {
        if ($_SESSION['user']?? false) {
            header('location: /');
            die();
        }
    }
}