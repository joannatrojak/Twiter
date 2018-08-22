<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tweet
 *
 * @author joasi
 */

class Tweet implements JsonSerializable
{
    //put your code here
    private $id;
    private $userId;
    private $text;
    private $creationDate;
    private static $databaseConnection;
    
    
    public function __construct()
    {
        $this->id = -1;
        $this->userId = "";
        $this->text = "";
        $this->creationDate = "";
        self::$databaseConnection = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_DB); 
    }
    public function getId()
    {
        return $this->id;
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function setText($text)
    {
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function saveToDb()
    {
        if ($this->id == -1)
        {
            $sql = "INSERT INTO tweet(userId, text, creationDate) VALUES ('$this->userId', '$this->text', $this->creationDate)";
            $result = self::$databaseConnection->query($sql);
            if ($result == true)
            {
                $this->id = self::$databaseConnection->insert_id;
                return true;
            }
            return false;
        }
    }
    static public function loadTweetById($id)
    {
        $sql = "SELECT * FROM tweet WHERE id = $id";
        $result = self::$databaseConnection->query($sql);
        if ($result == true && $result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $loadTweet = new Tweet();
            $loadTweet->id = $row['id'];
            $loadTweet->userId = $row['userId'];
            $loadTweet->text = $row['text'];
            $loadTweet->creationDate = $row['creationDate'];
            return $loadTweet;
        }
        return null;
    }
    static public function loadTweetsByUserId($userId)
    {
        $sql = "SELECT * FROM tweet WHERE userId = $userId";
        $result = self::$databaseConnection->query($sql);
        $ret = [];
        if ($result == true && $result->num_rows > 0)
        {
            foreach ($result as $row)
            {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $ret[] = $loadedTweet;
            }
            return $ret;
        }
        return null;
    }
    static public function loadAllTweets()
    {
        $sql = "SELECT * FROM tweet";
        $ret = [];
        $result = self::$databaseConnection->query($sql);
        if ($result == true && $result->num_rows > 0)
        {
            foreach ($result as $row)
            {
                $loadedTweet = new Tweet();
                $loadedTweet->id = $row['id'];
                $loadedTweet->userId = $row['userId'];
                $loadedTweet->text = $row['text'];
                $loadedTweet->creationDate = $row['creationDate'];
                $ret[] = $loadedTweet;
            }
            return $ret;
        }
        return null;
    }
    public function jsonSerialize()
    {
        return [
            'userId'       => $this->userId,
            'text' => $this->text,
            'creationDate'   => $this->creationDate,
        ];
    }
}
$tweet = new Tweet(); 
$tweet->setUserId(1); 
$tweet->setText('text text'); 
$tweet->setCreationDate(date('y-m-d'));
var_dump($tweet->jsonSerialize());



