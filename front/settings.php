<?php
session_start(); 
require_once '../rest/config/database.php'; 
require_once '../rest/class/User.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
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
            <li><a href="main.php">Main</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
</nav>
        <div class="container">
            <?php
            $userEmail = $_SESSION['username']; 
            $userId = $_SESSION['userId']; 
            echo "<h2>"; 
            echo 'Witaj, '.$userEmail; 
            echo "</h2>"; 
            ?>
            <h2>Zmień swoje ustawienia:</h2>
            <form action="" method="post">
                <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" id="username">
                 </div>
                <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                <label for="email">Password</label>
                <input type="password" class="form-control" id="password">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form> 
        </div>   
    </body>
</html>

