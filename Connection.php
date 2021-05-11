<?php

class Connection
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "php_web_shop";
    private $conn = null;

    //method making connection
    public function getConnection(){
        try {
            if($this->conn == null){
                $this->conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass,$this->dbName, 3307 );
            }

            return $this->conn;
        } catch (mysqli_sql_exception $exception){
            echo $exception->getMessage();
        }

    }
}