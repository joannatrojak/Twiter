<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author joasi
 */


include_once 'Database.php';
class User {
    private $id; 
    private $username; 
    private $password; 
    private $email; 
    private $databaseConnection;


    public function __construct() {
        $this->id = -1;
        $this->username = ''; 
        $this->password = ''; 
        $this->email = '';
        $this->databaseConnection = Database::getInstance(); 
    }
    public function setUsername($username){
        $this->username = $username; 
    }
    public function getUsername(){
        return $this->username; 
    }
    public function setPassword($newPassword){
        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT); 
        $this->password = $newHashedPassword;
    }
    public function getPassword(){
        return $this->password; 
    }
    public function setEmail($email){
        
        $expression =  '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';
        preg_match($expression, $this->email = $email, $result); 
        if ($result == NULL){
            throw new Exception('Email incorrect');
        }
        else{
            $this->email = $result[0];
        }
        
    }
    public function getEmail(){
        return $this->email;
    }
}



