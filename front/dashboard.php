<?php
session_start();
require_once '../rest/config/database.php'; 
require_once '../rest/class/User.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Twitter App</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Main</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
    <h1>Witaj, <?php echo $_SESSION['username'];?> !</h1>
    </div>
    <div class="row">
        <table id="tweetList" class="borderless">
            
        </table>
    </div>
</div>
    <script src="Tweet.js"></script>
</body>
</html>