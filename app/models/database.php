<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $db_name = 'ct275_project';
    private $username = 'root';
    private $password = '';
    private $connection = '';
    
    public function getConnection(){
        $this->connection = null;

        try {
            $this->connection = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name
                ,$this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $this->connection;
    }
}