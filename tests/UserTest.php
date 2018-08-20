<?php
use PHPUnit\Framework\TestCase;
require_once 'C:\xampp\htdocs\Twitter\class\User.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTest
 *
 * @author joasi
 */
class UserTest extends TestCase{
    //put your code here
    public function testInstanceOfClass(){
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
    public function testSetUsername(){
        $user = new User();
        $username = 'username';
        $this->assertEquals($user->getUsername(), $user->setUsername($username));
    }
    public function testSetPassword(){
        $user = new User(); 
        $password = 'password'; 
        $this->assertEquals($user->getPassword(), $user->setPassword($password));
    }
    public function testSetEmail(){
        $user = new User(); 
        $email = 'email@email.pl'; 
        $this->assertEquals($user->getEmail(), $user->setEmail($email));
    }
    public function testExpectionSetEmail(){
        $user = new User(); 
        $email = 'email';
        $this->expectExceptionMessage('Email incorrect');
        $user->setEmail($email);
    }
}
