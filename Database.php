<?php 
class Database {
    private $connection;

    public function __construct(){

        $dsn = "mysql:host=127.0.0.1;port=3306;dbname=myapp;user=root;charset=utf8mb4";
        
        $this->connection =new PDO($dsn);
    }

    public function query($query="SELECT * FROM posts"){

        $statment = $this->connection->prepare($query);
        
        $statment->execute();
        
        return $statment->fetchAll(PDO::FETCH_ASSOC);

    }

}