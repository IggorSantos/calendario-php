<?php
namespace Models;

abstract class ModelConnect{
    protected function connectDB() {
        try {
            $con = new \PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASS);  
            return $con;
        } catch (\PDOException $error) {
            return $error->getMessage();            
        }        
    }
}

