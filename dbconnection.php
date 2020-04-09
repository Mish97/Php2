<?php
class Database
{
    //Declaring Variables       
    private $dbServername;
    private $dbUsername;
    private $dbPassword;
    private $dbName;

    //connection to the database
    public function connect()
    {
        $this->dbServername = "sql312.epizy.com";
        $this->dbUsername = "epiz_25217093";
        $this->dbPassword = "jm69zqgr";
        $this->dbName = "epiz_25217093_php";
        $conn = new mysqli($this->dbServername,$this->dbUsername,$this->dbPassword,$this->dbName);        
        return $conn;
    }

    //mysqli real escape string function to prevent sqli injection into the database
    public function escape_string($value)
    {
        return $this->connect()->real_escape_string($value);
    }        
}
