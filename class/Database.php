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
    private $host = 'localhost'; 
    private $login = 'root'; 
    private $password = ''; 
    private $databaseName = 'Twitter'; 
    
    //connect to database
    private function __construct() {
        $mysqli = new mysqli($this->host, $this->login, $this->password, $this->databaseName);
        
        //check for errors
        if($mysqli->connect_error){
            print_r("Connection error ".mysqli_connect_error());
        }
    }
}
