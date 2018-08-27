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
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="#">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <form action="" method="post">
        <h3>Register</h3>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pwd">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
    if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['pwd']))
    {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $User = new User();
    $User->setEmail($email);
    $User->setUsername($username);
    $User->setPassword($pwd);
    //var_dump($User);
    //var_dump($email);
    if (!is_null($User::loadUserByEmail($email))){
        throw new Exception("Użytkownik istnieje już w bazie");
    }
    $User->createUser();
    echo "Konto zostało utworzone. Zaloguj się.";
    session_unset();
    }
    ?>
</div>
</body>
</html>

