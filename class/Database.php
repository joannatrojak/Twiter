<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author joasi
 */
class Database {
    //put your code here
    private static $instance = null;
    private $conn;
    private $host = 'localhost'; 
    private $login = 'root'; 
    private $password = ''; 
    private $databaseName = 'Twitter'; 
    
    //connect to database
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->login, $this->password, $this->databaseName);
        
        //check for errors
        if($this->conn->connect_error){
            print_r("Connection error ".mysqli_connect_error());
        }
    }
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new Database(); 
        }
        return self::$instance; 
    }
    public function getConnection(){
        return $this->conn;
    }
    
}
$database = Database::getInstance(); 
$conn = $database->getConnection(); 
var_dump($conn);
