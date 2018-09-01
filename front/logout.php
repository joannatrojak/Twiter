<?php
session_start();
include "config.php";
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
            <li class="active"><a href="dashboard.php">Main</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li class="active"><a href="#">Log Out</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <?php
    if (isset($_SESSION['username']) && isset($_SESSION['userId']))
    {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
    ?>
</div>
</body>
</html>

