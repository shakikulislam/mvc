<?php

class Database extends PDO
{
    public function __construct()
    {
        $dsn = 'mysql:dbname=db_mvc; host=localhost';
        $user = 'root';
        $pass = '';
        
        parent::__construct($dsn, $user, $pass);
    }

    public function Select($table){
        $sql = "SELECT * FROM ".$table;
        $query = $this->query($sql);
        $result = $query->fetchAll();
        return $result;
    }
}
