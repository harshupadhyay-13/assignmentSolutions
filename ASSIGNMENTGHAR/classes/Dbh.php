<?php
/**
* class of method which interact with database
*
*/
class Dbh{

/* * private @variables required to interact with database 
*/
    private $host="localhost";
    private $user="dev";
    private $pwd="nOYl9DxsaPxL428q";
    private $dbName="assignmentghar";

/* * Method accessible to child classes, doing a simple PDO connection with database
*/
    protected function connect(){
        try{
            $dsn ='mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO ($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_NAMED);
            return $pdo;
        }
        catch(PDOExpception $e){
            echo "Error!:" . $e->getMessage();
        }
    }

}