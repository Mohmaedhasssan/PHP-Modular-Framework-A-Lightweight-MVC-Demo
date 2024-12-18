<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}
function abort($code = 404)
{

    http_response_code($code);

    require "views/{$code}.php";  // ToDo : Check for $code view if exists

    die();

}
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition,$status=Response::FORBIDDEN)
{
  if (!$condition){
    abort($status);
  }
}