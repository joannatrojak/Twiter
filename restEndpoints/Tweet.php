<?php
//$conn = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_DB);
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $tweets = Tweet::loadAllTweets($conn); 
    $jsonTweets = [];
    foreach ($tweets as $tweet) {
        $jsonTweets[] = json_decode(json_encode($tweet), true);
    }
    $response = ['success' => $jsonTweets];
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tweet = new Tweet($conn); 
    $tweet->setUserId($_POST['user_Id']); 
    $tweet->setText($_POST['text']); 
    $tweet->setCreationDate($_POST['creation_Date']); 
    
    $tweet->saveToDb(); 
    $response = ['success' => [json_decode(json_encode($tweet), true)]];
} elseif ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    parse_str(file_get_contents("php://input"), $patchVars);
    $tweetToEdit = Tweet::loadTweetById($conn, $pathId)[0];
    $tweetToEdit->setUserId($patchVars['user_Id']);
    $tweetToEdit->setText($patchVars['text']);
    $tweetToEdit->setCreationDate($patchVars['creation_Date']);

    $tweetToEdit->save();

    $response = ['success' => [json_decode(json_encode($tweetToEdit), true)]];
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $deleteVars);
    $tweetToDelete = Tweet::loadTweetById($conn, $pathId)[0];
    $tweetToDelete->delete();

    $response = ['success' => 'deleted'];
} else {
    $response = ['error' => 'Wrong request method'];
}


