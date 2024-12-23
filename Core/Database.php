<?php

namespace Core;

use PDO;

class Database
{
    private $connection;

    private $statment;
    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = "mysql:" . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    
    public function query($query = "SELECT * FROM posts", $Params = [])
    {
        
        $this->statment = $this->connection->prepare($query);
        
        $this->statment->execute($Params);
        
        return $this;
        
    }
    function get(){

        return $this->statment->fetchAll();

    }

    public function find()
    {
        return $this->statment->fetch();
    }

    public function findOrAbort()
    {
        $result = $this->find();


        if (!$result) {
            abort();
        }

        return $result;

    }

}