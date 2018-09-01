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
class User {
    private $id; 
    private $username; 
    private $password; 
    private $email; 
    public static $databaseConnection;


    public function __construct() {
        $this->id = -1;
        $this->username = ''; 
        $this->password = ''; 
        $this->email = '';
        self::$databaseConnection = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_DB); 
    }
    public function getId(){
        return $this->id;
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
    public function createUser(){
        if ($this->id == -1){
            $sql = "INSERT INTO user (username, password, email) VALUES(?, ?, ?)";
            $stmt = self::$databaseConnection->prepare($sql); 
            $stmt->bind_param("sss", $this->username, $this->password, $this->email);
            if ($stmt->execute() == True){
                return TRUE; 
            }
            return FALSE; 
        }
    }
    static public function loadUserById($id){
        $sql = "SELECT * FROM user WHERE id=$id"; 
        $result = self::$databaseConnection->query($sql); 
        
        if ($result == true && $result->num_rows >0){
            $row = $result->fetch_assoc();
            $loadUser = new User();
            $loadUser->id = $row['id'];
            $loadUser->email = $row['email'];
            $loadUser->username = $row['username'];
            $loadUser->password = $row['password'];
            return $loadUser;
        }
        return null;
    }
    static public function loadAllUsers()
    {
        $sql = "SELECT * FROM user";
        $ret = [];
        $result = self::$databaseConnection->query($sql);
        if ($result == true && $result->num_rows != 0)
        {
            foreach($result as $row)
            {
                $loadedUser = new User();
                $loadedUser->id  = $row['id'];
                $loadedUser->email = $row['email'];
                $loadedUser->username = $row['username'];
                $loadedUser->password = $row['password'];
                $ret[] = $loadedUser;
            }
        }
        return $ret;
    }
    static public function loadUserByEmail($email)
    {
        $sql = "SELECT * FROM user WHERE email ='$email'";
        $result = self::$databaseConnection->query($sql);
        if ($result == true && $result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $loadedUser = new User();
            $loadedUser->id = $row['id'];
            $loadedUser->email = $row['email'];
            $loadedUser->username = $row['username'];
            $loadedUser->password = $row['password'];
            return $loadedUser;
        }
        return null;
    }
    public function delete()
    {
        if ($this->id != -1)
        {
            $sql = "DELETE FROM user WHERE id = $this->id";
            $result = self::$databaseConnection->query($sql);
            if ($result == true)
            {
                $this->id = -1;
                return true;
            }
            return false;
        }
        return true;
    }
    public function updateUser(){
            $sql = "UPDATE user SET email = '$this->email', username = '$this->username',
                      password= '$this->password'
                      WHERE id = $this->id";
            $result = self::$databaseConnection->query($sql);
            if ($result == true)
            {
                return true;
            }
            return false;
    }
}

