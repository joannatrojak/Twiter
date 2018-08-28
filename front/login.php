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
            <li><a href="register.php">Register</a></li>
            <li class="active"><a href="#">Login</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <form action="" method="post">
        <h3>Login</h3>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pwd">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
    if (!empty($_POST['email']) && !empty($_POST['pwd']))
    {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $user = new User();
        $User = $user::loadUserByEmail($email);
        
        if (!is_null($User) && password_verify($pwd, $User->getPassword())){
            $userId = $User->getId(); 
            $_SESSION['userId'] = $userId;
            $_SESSION['username'] = $User->getUsername();
            header("Location: dashboard.php");
        }
        echo "Błędny email bądź hasło";
        
    }
    ?>
</div>
</body>
</html>