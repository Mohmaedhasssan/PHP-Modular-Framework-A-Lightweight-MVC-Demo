<?php 

namespace Core\MiddleWare ;

class Middleware
{
    public static function handle($middleware)
    {
        if (! $middleware) {
            return;
        }

        $middleware = "Core\\MiddleWare\\{$middleware}";

        if (! class_exists($middleware)) {
            throw new \Exception("Middleware class {$middleware} not found");
        }

        $middleware = new $middleware;

        $middleware->handle();
    }
}